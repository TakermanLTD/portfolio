FROM mcr.microsoft.com/dotnet/aspnet:6.0 AS base
WORKDIR /app
EXPOSE 80
EXPOSE 443

FROM mcr.microsoft.com/dotnet/sdk:6.0 AS build
WORKDIR /src
COPY ["Takerman.Portfolio.csproj", "."]
RUN dotnet restore "Takerman.Portfolio.csproj"
COPY . .
RUN dotnet build "Takerman.Portfolio.csproj" -c Release -o /app/build

FROM build AS publish
RUN dotnet publish "Takerman.Portfolio.csproj" -c Release -o /app/publish

FROM base AS final
WORKDIR /app
COPY --from=publish /app/publish .
ENTRYPOINT ["dotnet", "Takerman.Portfolio.dll"]