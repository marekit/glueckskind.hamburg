server {
    listen  80;

    root {{ item.docroot }};
    index {{ item.docindex }};

    server_name {{ item.servername }};

    sendfile off;

    fastcgi_buffers 8 16k;
    fastcgi_buffer_size 32k;

    access_log /var/log/nginx/{{ item.name }}.access.log;
    error_log /var/log/nginx/{{ item.name }}.error.log;

    location / {
        try_files $uri $uri/ /{{ item.docindex }}?$query_string;
    }

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php/php7.0-fpm.sock;
        fastcgi_index {{ item.docindex }};
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
