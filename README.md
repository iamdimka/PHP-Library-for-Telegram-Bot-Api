# Telegram-library-for-PHP
Not official library for working with Telegram API for BOTS

[Telegram Bots api API](https://core.telegram.org/bots/api)

'''php
    $telegram = new Telegram(BOT_ACCESS_TOKEN);
    $data = $telegram->getMe();
'''

'''php
    $telegram->setModeObject(true);
'''