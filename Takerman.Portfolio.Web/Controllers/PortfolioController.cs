using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Localization;
using Microsoft.Extensions.Localization;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using Takerman.Portfolio.Web.Models;
using Takerman.Portfolio.Web.Resources;
using Takerman.Portfolio.Web.Models.Services;

namespace Takerman.Portfolio.Web.Controllers
{
    public class PortfolioController : BaseController
    {
        public PortfolioController(ILogger<PortfolioController> logger,
            NavLinksService navLinksService,
            IStringLocalizer<PortfolioController> localizer,
            IHtmlLocalizer<SharedResource> sharedLocalizer,
            IStringLocalizerFactory factory) : base(logger, navLinksService, localizer, sharedLocalizer, factory)
        {
        }

        public IActionResult Index()
        {
            Layout.Head.Title = "Portfolio | " + Layout.Head.Title + " | Software Company";
            Layout.Banner.Title = "Portfolio";
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = "Home" },
                new NavLink(){ Action = "Index", Controller = "Portfolio", Label = "Portfolio" }
            };

            var model = new Models.Partials.Portfolio();
            return View(model);
        }

        public IActionResult Project(string name)
        {
            Layout.Head.Title = name + " | " + Layout.Head.Title + " | Software Company";
            Layout.Banner.Title = "Portfolio";
            Layout.Banner.NavLinks = new List<NavLink>()
            {
                new NavLink(){ Action = "Index", Controller = "Home", Label = "Home" },
                new NavLink(){ Action = "Index", Controller = "Portfolio", Label = "Portfolio" },
                new NavLink(){ Action = "Project", Controller = "Portfolio", Label = name, Data = new { name = name } }
            };
            return View(name);
        }
    }
}