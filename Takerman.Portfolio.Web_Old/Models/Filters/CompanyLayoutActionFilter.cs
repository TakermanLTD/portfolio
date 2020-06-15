using Microsoft.AspNetCore.Mvc.Filters;
using System;
using Takerman.Portfolio.Web.Controllers;

namespace Takerman.Portfolio.Web.Models.Filters
{
    public class CompanyLayoutActionFilter : Attribute, IActionFilter
    {
        public void OnActionExecuted(ActionExecutedContext context)
        {
        }

        public void OnActionExecuting(ActionExecutingContext context)
        {
            var controller = context.Controller as BaseController;

            if (controller != null)
            {
                controller.ViewData["Layout"] = controller.Layout;
            }
        }
    }
}