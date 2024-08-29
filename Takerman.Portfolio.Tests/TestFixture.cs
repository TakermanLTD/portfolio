using Microsoft.Extensions.Configuration;
using Microsoft.Extensions.DependencyInjection;
using Takerman.Mail;
using Xunit.Microsoft.DependencyInjection;
using Xunit.Microsoft.DependencyInjection.Abstracts;

namespace Takerman.Portfolio.Tests
{
    public class TestFixture : TestBedFixture
    {
        protected override void AddServices(IServiceCollection services, IConfiguration? configuration)
            => services
                .AddTransient<IMailService, MailService>()
                .Configure<RabbitMqConfig>(options => configuration.GetSection(nameof(RabbitMqConfig)).Bind(options));

        protected override ValueTask DisposeAsyncCore() => new();

        protected override IEnumerable<TestAppSettings> GetTestAppSettings()
        {
            yield return new() { Filename = "test-appsettings.json", IsOptional = false };
        }
    }
}