using Takerman.Mail;
using Takerman.Logging;
using Takerman.Portfolio.Server.Middleware;

var builder = WebApplication.CreateBuilder(args);
builder.Logging.AddTakermanLogging();
builder.Services.AddControllers();
builder.Services.AddExceptionHandler<BadRequestExceptionHandler>();
builder.Services.AddExceptionHandler<GlobalExceptionHandler>();
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