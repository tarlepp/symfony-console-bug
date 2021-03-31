# What is this?

This repository contains example for https://github.com/symfony/symfony/issues/40634 bug

## How to install?

Clone this repository and run `composer install`

## How to see actual bug?

After installation just run `php application.php table-bug`, you should see that wrapped
text causes result like;

```bash
da_wunder@wunder-VirtualBox:~/PhpstormProjects/symfony-console-bug$ php application.php table-bug
┌─────┬─────┬────────────┬────────┐
│ h1  │ h2  │ h3         │ h4     │
├─────┼─────┼────────────┼────────┤
│ foo │ bar │ foobar     │ barfoo │
│     │     │ some text  │        │
│     │     │ long wrapp │        │
│     │     │ ed text  │        │
└─────┴─────┴────────────┴────────┘
jeeda_wunder@wunder-VirtualBox:~/PhpstormProjects/symfony-console-bug$
```

Then change `"symfony/console": "5.2.6"` to `"symfony/console": "5.2.5"` in `composer.json` file
and run that command again, and then you should see result like;

```bash
da_wunder@wunder-VirtualBox:~/PhpstormProjects/symfony-console-bug$ php application.php table-bug
┌─────┬─────┬────────────┬────────┐
│ h1  │ h2  │ h3         │ h4     │
├─────┼─────┼────────────┼────────┤
│ foo │ bar │ foobar     │ barfoo │
│     │     │ some text  │        │
│     │     │ long wrapp │        │
│     │     │ ed text    │        │
└─────┴─────┴────────────┴────────┘
jeeda_wunder@wunder-VirtualBox:~/PhpstormProjects/symfony-console-bug$
```

## License 

MIT
