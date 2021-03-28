using Cofoundry.Domain;
using Cofoundry.Domain.CQS;

namespace Takerman.Portfolio.Web.Domain
{
    public class SearchCatSummariesQuery
        : SimplePageableQuery
        , IQuery<PagedQueryResult<CatSummary>>
    {
    }
}