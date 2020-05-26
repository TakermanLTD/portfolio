using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Localization;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System.Diagnostics;
using Takerman.Portfolio.Web.Models;
using Takerman.Portfolio.Web.Models.Services;
using Takerman.Portfolio.Web.Resources;

namespace Takerman.Portfolio.Web.Controllers
{
    public class HomeController : BaseController
    {
        public HomeController(ILogger<HomeController> logger,
            NavLinksService navLinksService,
            IStringLocalizer<HomeController> localizer,
            IHtmlLocalizer<SharedResource> sharedLocalizer,
            IStringLocalizerFactory factory) : base(logger, navLinksService, localizer, sharedLocalizer, factory)
        {
        }

        public IActionResult Index()
        {
            Layout.Head.Title = "Home | " + Layout.Head.Title + " | Software Company";
            Layout.Banner = null;
            return View();
        }

        [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
        public IActionResult Error()
        {
            return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
        }
    }
}