<?php

class TelegramMethods extends Telegram
{
    /**
     * A simple method for testing your bot's auth token. Requires no parameters
     *
     * @link https://core.telegram.org/bots/api#getme
     *
     * @return mixed Returns basic information about the bot in form of a User object.
     *
     * @throws Exception
     */
    public function getMe()
    {
        return $this->call('getMe');
    }

    /**
     * Use this method to send text messages
     *
     * @link https://core.telegram.org/bots/api#sendmessage
     *
     * @param array $params
     *
     * @return mixed On success, the sent Message is returned.
     *
     * @throws Exception
     */
    public function sendMessage(array $params)
    {
        return $this->call('sendMessage', $params);
    }

    /**
     * Use this method to forward messages of any kind
     *
     * @link https://core.telegram.org/bots/api#forwardmessage
     *
     * @param array $params
     *
     * @return mixed On success, the sent Message is returned
     *
     * @throws Exception
     */
    public function forwardMessage(array $params)
    {
        return $this->call('forwardMessage', $params);
    }

    /**
     * Use this method to send photos
     *
     * @link https://core.telegram.org/bots/api#sendphoto
     *
     * @param array $params
     *
     * @return mixed On success, the sent Message is returned
     *
     * @throws Exception
     */
    public function sendPhoto(array $params)
    {
        return $this->call('sendPhoto', $params);
    }

    /**
     * Use this method to send audio files, if you want Telegram
     * clients to display the file as a playable voice message.
     * For this to work, your audio must be in an .ogg file encoded
     * with OPUS (other formats may be sent as Document).
     *
     * Bots can currently send audio files of up to 50 MB in size,
     * this limit may be changed in the future.
     *
     * @link https://core.telegram.org/bots/api#sendaudio
     *
     * @param array $params
     *
     * @return mixed On success, the sent Message is returned
     *
     * @throws Exception
     */
    public function sendAudio(array $params)
    {
        return $this->call('sendPhoto', $params);
    }

    /**
     * Use this method to send general files.
     *
     * Bots can currently send files of any type of up to 50 MB in size,
     * this limit may be changed in the future.
     *
     * @link https://core.telegram.org/bots/api#senddocument
     *
     * @param array $params
     *
     * @return mixed On success, the sent Message is returned
     *
     * @throws Exception
     */
    public function sendDocument(array $params)
    {
        return $this->call('sendDocument', $params);
    }

    /**
     * Use this method to send .webp stickers
     *
     * @link https://core.telegram.org/bots/api#sendsticker
     *
     * @param array $params
     *
     * @return mixed On success, the sent Message is returned
     *
     * @throws Exception
     */
    public function sendSticker(array $params)
    {
        return $this->call('sendSticker', $params);
    }

    /**
     * Use this method to send video files, Telegram clients support mp4 videos
     * (other formats may be sent as Document).
     *
     * Bots can currently send video files of up to 50 MB in size,
     * this limit may be changed in the future.
     *
     * @link https://core.telegram.org/bots/api#sendvideo
     *
     * @param array $params
     *
     * @return mixed On success, the sent Message is returned
     *
     * @throws Exception
     */
    public function sendVideo(array $params)
    {
        return $this->call('sendVideo', $params);
    }

    /**
     * Use this method to send point on the map
     *
     * @link https://core.telegram.org/bots/api#sendlocation
     *
     * @param array $params
     *
     * @return mixed On success, the sent Message is returned
     *
     * @throws Exception
     */
    public function sendLocation(array $params)
    {
        return $this->call('sendLocation', $params);
    }

    /**
     * Use this method when you need to tell the user that something is happening on the bot's side.
     * The status is set for 5 seconds or less (when a message arrives from your bot,
     * Telegram clients clear its typing status).
     *
     * @link https://core.telegram.org/bots/api#sendchataction
     *
     * @param array $params
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function sendChatAction(array $params)
    {
        return $this->call('sendChatAction', $params);
    }

    /**
     * Use this method to get a list of profile pictures for a user
     *
     * @link https://core.telegram.org/bots/api#getuserprofilephotos
     *
     * @param array $params
     *
     * @return mixed Returns a UserProfilePhotos object.
     *
     * @throws Exception
     */
    public function getUserProfilePhotos(array $params)
    {
        return $this->call('getUserProfilePhotos', $params);
    }
} 