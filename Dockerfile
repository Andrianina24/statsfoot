# Dockerfile
FROM richarvey/nginx-php-fpm:3.1.6

COPY . .

RUN apk update && \
    apk add --no-cache npm && \
    npm install && \
    ls -l && \  # Add this line for debugging
    npm run build

CMD ["/start.sh"]
