using System.Net;
using System.Net.Mail;
using Microsoft.AspNetCore.Mvc;
using Takerman.Portfolio.Models;

namespace Takerman.Portfolio.Controllers;

[ApiController]
[Route("[controller]")]
public class HomeController : ControllerBase
{
    private readonly ILogger<HomeController> _logger;

    public HomeController(ILogger<HomeController> logger)
    {
        _logger = logger;
    }

    [HttpPost]
    public bool Post([FromBody] MessageDto request)
    {
        var message = new MailMessage(request.Email, "contact@takerman.net")
        {
            Subject = request.Subject,
            Body = request.Message
        };

        var client = new SmtpClient("smtp.gmail.com", 587)
        {
            Credentials = new NetworkCredential("tivanov@takerman.net", "iftdskryilizhvcb"),
            EnableSsl = true,
            UseDefaultCredentials = false
        };
        
        try
        {
            client.Send(message);
        }
        catch (Exception ex)
        {
            Console.WriteLine("Exception caught while Sending message: {0}", ex.ToString());
        }

        return true;
    }
}
