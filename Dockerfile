FROM mcr.microsoft.com/dotnet/aspnet:8.0 AS base
ENV ASPNETCORE_ENVIRONMENT Production
RUN --mount=type=secret,id=github_token cat /run/secrets/github_token
WORKDIR /app
EXPOSE 80
EXPOSE 443
RUN apt-get update
RUN apt-get install -y curl gnupg
RUN apt-get install -y libpng-dev libjpeg-dev curl libxi6 build-essential libgl1-mesa-glx sed
RUN curl -fsSL https://deb.nodesource.com/nsolid_setup_deb.sh | sh -s 20
RUN apt-get install -y nodejs

FROM mcr.microsoft.com/dotnet/sdk:8.0 AS build
RUN apt-get update
RUN apt-get install -y curl
RUN apt-get install -y libpng-dev libjpeg-dev curl libxi6 build-essential libgl1-mesa-glx
RUN curl -fsSL https://deb.nodesource.com/nsolid_setup_deb.sh | sh -s 20
RUN apt-get install -y nodejs
ARG BUILD_CONFIGURATION=Release

WORKDIR /src
COPY ["Takerman.Portfolio.Server/Takerman.Portfolio.Server.csproj", "Takerman.Portfolio.Server/"]
COPY ["takerman.portfolio.client/takerman.portfolio.client.esproj", "takerman.portfolio.client/"]
COPY takerman.portfolio.client/nuget.config ./
RUN sed -i "s|</configuration>|<packageSourceCredentials><github><add key=\"Username\" value=\"takerman\"/><add key=\"ClearTextPassword\" value=\"${github_token}\"/></github></packageSourceCredentials></configuration>|" nuget.config
RUN dotnet clean "./Takerman.Portfolio.Server/./Takerman.Portfolio.Server.csproj"
RUN dotnet nuget add source https://nuget.pkg.github.com/takermanltd/index.json --name github
RUN dotnet nuget list source
RUN dotnet restore "./Takerman.Portfolio.Server/./Takerman.Portfolio.Server.csproj"
COPY . .
WORKDIR "/src/Takerman.Portfolio.Server"
RUN dotnet build "./Takerman.Portfolio.Server.csproj" -c $BUILD_CONFIGURATION -o /app/build
RUN dotnet test "./Takerman.Portfolio.Server/./Takerman.Portfolio.Server.csproj"

FROM build AS publish
ARG BUILD_CONFIGURATION=Release
RUN dotnet publish "./Takerman.Portfolio.Server.csproj" -c $BUILD_CONFIGURATION -o /app/publish /p:UseAppHost=false

FROM base AS final
WORKDIR /app
COPY --from=publish /app/publish .
ENTRYPOINT ["dotnet", "Takerman.Portfolio.Server.dll"]