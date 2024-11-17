FROM nginx:1.24-alpine

# Argumento para el UID del usuario
ARG UID

# Crear usuario appuser
RUN adduser -u ${UID} --disabled-password --gecos "" appuser

# Copiar configuraciones necesarias
COPY nginx.conf /etc/nginx/nginx.conf
COPY templates /etc/nginx/templates/

# Configurar upstream para PHP-FPM
RUN echo "upstream php-upstream { server php:9000; }" > /etc/nginx/conf.d/upstream.conf

# Exponer los puertos estándar de Nginx
EXPOSE 80
EXPOSE 443
