using System.Collections.Generic;

namespace Takerman.Portfolio.Web.Models.Partials
{
    public class Portfolio
    {
        public Portfolio()
        {
            this.Projects = new List<Project>();

            this.Projects = new List<Project>()
                    {
                        new Project(){ SizeMd = 6, SizeLg = 6, Type = "Other", Client = "List with various short term projects", Location = "", Name = "Various", Title = "Various short term projects", Image = "/img/portfolio/p1.png" },
                    };
        }

        public IEnumerable<Project> Projects { get; set; }
    }
}