FROM php:8.1-apache

# Copy the lab files into the web root
COPY src/ /var/www/html/

# Create a system-level flag
RUN echo "FLAG{D0ck3r_R00t_C0mpr0m1s3d}" > /root/root_flag.txt

# Configure permissions for Log Poisoning (Level 6)
RUN chmod 644 /var/log/apache2/access.log
RUN chmod 644 /var/log/apache2/error.log

# Ensure the session directory is writable
RUN mkdir -p /var/lib/php/sessions && \
    chown -R www-data:www-data /var/lib/php/sessions && \
    chmod -R 777 /var/lib/php/sessions

# Create a writable uploads directory for Level 8
RUN mkdir -p /var/www/html/uploads && \
    chown -R www-data:www-data /var/www/html/uploads && \
    chmod -R 777 /var/www/html/uploads

# Configure PHP settings (Enable allow_url_include for RFI & Data Wrappers)
RUN echo "session.save_path=\"/var/lib/php/sessions\"" > /usr/local/etc/php/conf.d/session.ini
RUN echo "allow_url_include=On" > /usr/local/etc/php/conf.d/vulnerable.ini