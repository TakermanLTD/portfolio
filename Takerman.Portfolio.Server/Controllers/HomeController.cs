using Microsoft.AspNetCore.Mvc;
using Takerman.Extensions;
using Takerman.Mail;

namespace Takerman.Portfolio.Server.Controllers
{
    [ApiController]
    [Route("[controller]")]
    public class HomeController(ILogger<HomeController> _logger, IMailService _mailService) : ControllerBase
    {
        [HttpPost("SendMessage")]
        public async Task SendMessage(MailMessageDto message)
        {
            try
            {
                await _mailService.SendToQueue(message);
            }
            catch (Exception ex)
            {
                _logger.LogError(ex, "*Takerman*: An error occured when sending an email. {Exception}", ex.GetMessage());
            }
        }
    }
}