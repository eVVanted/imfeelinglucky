FROM nginx:1.27-alpine
COPY docker/nginx/site.conf /etc/nginx/conf.d/default.conf
