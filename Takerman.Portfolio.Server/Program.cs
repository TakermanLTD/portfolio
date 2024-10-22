using Takerman.Mail;
using Takerman.Logging;

var builder = WebApplication.CreateBuilder(args);
builder.Logging.AddTakermanLogging();
builder.Services.AddControllers();
builder.Services.Configure<RabbitMqConfig>(builder.Configuration.GetSection(nameof(RabbitMqConfig)));
builder.Services.AddScoped<IMailService, MailService>();

var app = builder.Build();
app.UseDefaultFiles();
app.UseStaticFiles();
app.UseHttpsRedirection();
app.UseAuthorization();
app.MapControllers();
app.MapFallbackToFile("/index.html");
app.Run();