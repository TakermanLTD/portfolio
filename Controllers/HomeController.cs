using System.Net;
using System.Net.Mail;
using System.Reflection;
using Microsoft.AspNetCore.Mvc;
using Takerman.Portfolio.Models;

namespace Takerman.Portfolio.Controllers;

[ApiController]
[Route("[controller]")]
public class HomeController : ControllerBase
{
    private readonly ILogger<HomeController> _logger;
    private readonly IConfiguration _configuration;

    public HomeController(ILogger<HomeController> logger, IConfiguration configuration)
    {
        _logger = logger;
        _configuration = configuration;
    }

    [HttpPost]
    public bool Post([FromBody] MessageDto request)
    {
        _logger.LogInformation(request.FullName);

        var to = new MailAddress(_configuration["Smtp:UserName"]);
        var from = new MailAddress(request.Email, request.FullName);

        var email = new MailMessage(from, to)
        {
            Subject = request.Subject,
            Body = "From: " + request.Email + ": " + Environment.NewLine + request.Message
        };

        var smtp = new SmtpClient
        {
            Host = _configuration["Smtp:Server"],
            Port = int.TryParse(_configuration["Smtp:Port"], out int port) ? port : 587,
            Credentials = new NetworkCredential(_configuration["Smtp:UserName"], _configuration["Smtp:Password"]),
            DeliveryMethod = SmtpDeliveryMethod.Network,
            EnableSsl = true
        };

        try
        {
            smtp.Send(email);
        }
        catch (SmtpException ex)
        {
            Console.WriteLine(ex.ToString());
        }

        return true;
    }
}
