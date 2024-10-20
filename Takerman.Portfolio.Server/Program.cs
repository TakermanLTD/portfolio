using Serilog;
using Serilog.Events;
using Serilog.Sinks.Slack;
using Serilog.Sinks.Slack.Models;
using Takerman.Mail;

var builder = WebApplication.CreateBuilder(args);
builder.Services.AddControllers();
builder.Services.Configure<RabbitMqConfig>(builder.Configuration.GetSection(nameof(RabbitMqConfig)));
builder.Services.AddScoped<IMailService, MailService>();

Log.Logger = new LoggerConfiguration()
    .MinimumLevel.Warning()
    .ReadFrom.Configuration(builder.Configuration)
    .WriteTo.Slack(new SlackSinkOptions
    {
        WebHookUrl = "https://hooks.slack.com/services/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",
        CustomIcon = ":office:",
        Period = TimeSpan.FromSeconds(10),
        ShowDefaultAttachments = false,
        ShowExceptionAttachments = true,
        MinimumLogEventLevel = LogEventLevel.Error,
        PropertyDenyList = ["Level", "SourceContext"]
    })
    .CreateLogger();

var app = builder.Build();
app.UseDefaultFiles();
app.UseStaticFiles();
app.UseHttpsRedirection();
app.UseAuthorization();
app.MapControllers();
app.MapFallbackToFile("/index.html");
app.Run();