<!-- DO NOT EDIT THIS FILE! -->
<!-- Instead edit contrib/hangouts.php -->
<!-- Then run bin/docgen -->

# hangouts

[Source](/contrib/hangouts.php)


Require the Google Hangouts Chat recipe in your `deploy.php` file:

```php
require 'contrib/chat.php';
```

Add hook on deploy:

```php
before('deploy', 'chat:notify');
```

## Configuration

- `chat_webhook` – chat incoming webhook url, **required**
- `chat_title` – the title of your notification card, default `{{application}}`
- `chat_subtitle` – the subtitle of your card, default `{{hostname}}`
- `chat_favicon` – an image for the header of your card, default `http://{{hostname}}/favicon.png`
- `chat_line1` – first line of the text in your card, default: `{{branch}}`
- `chat_line2` – second line of the text in your card, default: `{{stage}}`

## Usage

If you want to notify only about beginning of deployment add this line only:

```php
before('deploy', 'chat:notify');
```

If you want to notify about successful end of deployment add this too:

```php
after('deploy:success', 'chat:notify:success');
```

If you want to notify about failed deployment add this too:

```php
after('deploy:failed', 'chat:notify:failure');
```



* Config
  * [`chat_title`](#chat_title)
  * [`chat_subtitle`](#chat_subtitle)
  * [`favicon`](#favicon)
  * [`chat_line1`](#chat_line1)
  * [`chat_line2`](#chat_line2)
* Tasks
  * [`chat:notify`](#chatnotify) — Notifying Google Hangouts Chat
  * [`chat:notify:success`](#chatnotifysuccess) — Notifying Google Hangouts Chat about deploy finish
  * [`chat:notify:failure`](#chatnotifyfailure)

## Config
### chat_title
[Source](/contrib/hangouts.php#L50)

Title of project

### chat_subtitle
[Source](/contrib/hangouts.php#L54)



### favicon
[Source](/contrib/hangouts.php#L57)

If 'favicon' is set Google Hangouts Chat will decorate your card with an image.

### chat_line1
[Source](/contrib/hangouts.php#L60)

Deploy messages

### chat_line2
[Source](/contrib/hangouts.php#L61)




## Tasks
### chat:notify
[Source](/contrib/hangouts.php#L64)



### chat:notify:success
[Source](/contrib/hangouts.php#L107)



### chat:notify:failure
[Source](/contrib/hangouts.php#L150)



