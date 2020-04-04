using System;
using System.Collections.Generic;
using System.Linq;

namespace Takerman.Portfolio.Web.Models.Partials
{
    public class Blog
    {
        public Blog(int? maxPostsCount = null)
        {
            this.BlogItemsMini = new List<BlogItemMini>();

                    this.BlogItemsMini = new List<BlogItemMini>()
                    {
                        new BlogItemMini(){
                            Author = "Tanyo Ivanov",
                            Title = "Branding renewed",
                            Content = "Our branding, website and logo now is renewed and we are available to take new projects. Please use the contact section to learn more, send us an email or call us.",
                            Date = new DateTime(2020, 1, 12),
                            Image = "/img/png_logomark.png",
                            Name = "company-renewed" }
                    };

            this.BlogItemsMini = this.BlogItemsMini.Reverse();

            if (maxPostsCount != null)
            {
                this.BlogItemsMini = this.BlogItemsMini.Take((int)maxPostsCount);
            }
        }
        public IEnumerable<BlogItemMini> BlogItemsMini { get; set; }
    }
}