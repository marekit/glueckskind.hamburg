server {
    listen  80;

    root {{ item.docroot }};
    index {{ item.docindex }};

    server_name {{ item.servername }};

    sendfile off;

    fastcgi_buffers 8 16k;
    fastcgi_buffer_size 32k;
    client_max_body_size 200M;

    access_log /var/log/nginx/{{ item.name }}.access.log;
    error_log /var/log/nginx/{{ item.name }}.error.log;

    #Access block for folders
    location ~ _(?:recycler|temp)_/ {
        deny all;
        access_log off;
        log_not_found off;
    }

    location ~ ^/fileadmin/templates/.*\.(?:txt|ts)$ {
        deny all;
        access_log off;
        log_not_found off;
    }

    location ~ ^/typo3temp/logs/ {
        deny all;
        access_log off;
        log_not_found off;
    }

    location ~ ^/(vendor|typo3_src)/ {
        deny all;
        access_log off;
        log_not_found off;
    }

    location ~ ^/(?:typo3conf/ext|typo3/sysext|typo3/ext)/[^/]+/(?:Configuration|Resources/Private|Tests?)/ {
        deny all;
        access_log off;
        log_not_found off;
    }

    #Block access to hidden directories or files.
    location ~ ^/\. {
        deny all;
        access_log off;
        log_not_found off;
    }

    #Access block for files
    location ~ (?i:^/\.|^/#.*#|^/(?:ChangeLog|ToDo|Readme|License)(?:\.md|\.txt)?|^/composer\.(?:json|lock)|^/ext_conf_template\.txt|^/ext_typoscript_constants\.txt|^/ext_typoscript_setup\.txt|flexform[^.]*\.xml|locallang[^.]*\.(?:xml|xlf)|\.(?:bak|co?nf|cfg|ya?ml|ts|dist|fla|in[ci]|log|sh|sql(?:\..*)?|sw[op]|git.*)|.*(?:~|rc))$ {
        deny all;
        access_log off;
        log_not_found off;
    }

    #Block access to vcs directories
    location ~ \.(?:git|svn|hg)$ {
        deny all;
        access_log off;
        log_not_found off;
    }

    location / {
        try_files $uri $uri/ /{{ item.docindex }}?$query_string;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php/php7.0-fpm.sock;
        fastcgi_index {{ item.docindex }};
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param TYPO3_CONTEXT Development;
    }
}
