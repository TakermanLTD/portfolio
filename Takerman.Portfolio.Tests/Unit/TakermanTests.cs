using Xunit.Abstractions;
using Xunit.Microsoft.DependencyInjection.Abstracts;

namespace Takerman.Portfolio.Tests.Unit
{
    public class TakermanTests(ITestOutputHelper testOutputHelper, TestFixture fixture) : TestBed<TestFixture>(testOutputHelper, fixture)
    {
        [Fact]
        public void Should_ReturnTrue_When_TheTestIsCalled()
        {
            Assert.True(true);
        }
    }
}