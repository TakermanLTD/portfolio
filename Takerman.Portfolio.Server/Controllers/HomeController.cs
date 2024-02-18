using Microsoft.AspNetCore.Mvc;
using Takerman.Mail;

namespace Takerman.Portfolio.Server.Controllers
{
    [ApiController]
    [Route("[controller]")]
    public class HomeController(ILogger<HomeController> logger, IMailService mailService) : ControllerBase
    {
        private readonly ILogger<HomeController> _logger = logger;
        private readonly IMailService _mailService = mailService;

        [HttpPost("SendMessage")]
        public async Task SendMessage(MailMessageDto message)
        {
            await _mailService.SendToQueue(message);
        }
    }
}