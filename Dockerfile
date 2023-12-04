# Dockerfile
# Use base image for container
FROM richarvey/nginx-php-fpm:3.1.6

# Copy all application code into your Docker container
COPY . .

RUN apk update

# Install the `npm` package
RUN apk add --no-cache npm

# Install NPM dependencies
RUN npm install

# Build Vite assets
# RUN npm run build

# Expose port 80 for HTTP
EXPOSE 80

CMD ["/start.sh"]