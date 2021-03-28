using Cofoundry.Domain.CQS;
using System.Collections.Generic;

namespace Takerman.Portfolio.Web.Domain
{
    public class GetAllFeaturesQuery : IQuery<ICollection<Feature>>
    {
    }
}