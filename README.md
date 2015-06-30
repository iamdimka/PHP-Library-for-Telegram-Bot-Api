# Telegram-library-for-PHP
Not official library for working with Telegram API for BOTS

**Requires curl**

[Telegram Bots api API](https://core.telegram.org/bots/api)

##Basic usage
```php
    $telegram = new Telegram(BOT_ACCESS_TOKEN);
    try {
        $data = $telegram->getMe();
    } catch (Exception $e) {
        // You can catch Telegram exceptions here
    }
```

##If you want you can return response object
```php
    $telegram->setModeObject(true);
```


##Send file issue
```php
    $telegram->sendPhoto([
        'chat_id' => CHAT_ID,
        'photo' => FILE_PATH
    ]);
```

or you can just send file id. [Resending files without reuploading](https://core.telegram.org/bots/api#resending-files-without-reuploading)
```php
    $telegram->sendPhoto([
        'chat_id' => CHAT_ID,
        'photo' => [
                'file_id' => FILE_ID
        ]
    ]);
```

If you want autocomplete methods, for example for your IDE, Use TelegramMethods class. It is already has PHPDoc
description with links on telegram website.
