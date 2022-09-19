using Microsoft.AspNetCore.Mvc;

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
    public bool Get()
    {
        return true;
    }
}
