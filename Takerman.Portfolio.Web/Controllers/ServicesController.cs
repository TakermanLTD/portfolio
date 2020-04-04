using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Localization;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using Takerman.Portfolio.Web.Models;
using Takerman.Portfolio.Web.Models.Services;
using Takerman.Portfolio.Web.Resources;

namespace Takerman.Portfolio.Web.Controllers
{
    public class ServicesController : BaseController
    {
        public ServicesController(ILogger<ServicesController> logger,
            NavLinksService navLinksService,
            IStringLocalizer<ServicesController> localizer,
            IHtmlLocalizer<SharedResource> sharedLocalizer,
            IStringLocalizerFactory factory) : base(logger, navLinksService, localizer, sharedLocalizer, factory)
        {
        }

        public IActionResult Index()
        {
            Layout.Head.Title = "Services | " + Layout.Head.Title + " | Software Company";
            Layout.Banner.Title = "Services";
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = "Home" },
                new NavLink(){ Action = "Index", Controller = "Services", Label = "Services" },
            };
            return View();
        }
    }
}