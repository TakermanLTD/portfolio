# Get the base image
FROM mcr.microsoft.com/dotnet/sdk:6.0 AS build-env
WORKDIR /app

# Copy the csproj and restore all of the nugets
COPY Takerman.Portfolio.csproj ./
RUN dotnet restore

# Copy everything else and build
COPY ./ ./
RUN dotnet publish -c Release -o out

# Build runtime image
FROM mcr.microsoft.com/dotnet/sdk:6.0
WORKDIR /app
COPY --from=build-env /app/out .
EXPOSE 7282
EXPOSE 5114
ENTRYPOINT ["dotnet", "Takerman.Portfolio.dll"]
