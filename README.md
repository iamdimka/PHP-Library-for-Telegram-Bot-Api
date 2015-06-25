# Telegram-library-for-PHP
Not official library for working with Telegram API for BOTS

**Requires curl**

[Telegram Bots api API](https://core.telegram.org/bots/api)

Basic usage
```php
    $telegram = new Telegram(BOT_ACCESS_TOKEN);
    try {
        $data = $telegram->getMe();
    } catch (Exception $e) {
        // You can catch Telegram exceptions here
    }
```

If you want you can return response object
```php
    $telegram->setModeObject(true);
```