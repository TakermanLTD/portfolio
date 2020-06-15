using System.Web.Http;
using System.Web.Mvc;
using Umbraco.Web.Models;
using Umbraco.Web.Mvc;

namespace Takerman.Portfolio
{

    public class HomeController : RenderMvcController
    {
        public override ActionResult Index(ContentModel model)
        {
            return base.Index(model);
        }

        public ActionResult Subscribe([FromBody]FormCollection formCollection)
        {
            var email = formCollection["email"];

            // TODO: subscribe the email to the news

            return View("Home");
        }
    }
}