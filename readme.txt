=== Sagenda - Free booking system  ===
Contributors: sagenda
Donate link: http://www.sagenda.com/community/
Tags: booking, appointment, scheduling, availability, reservation, rental, free, accommodation, booking form, reservation form, event, BnB
Requires at least: 3.0
Tested up to: 4.7.5
Stable tag: 1.2.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Sagenda is a free online booking / scheduling / reservation module that helps your clients fix appointments at absolutely NO COST!

== Description ==

Sagenda is an online booking software that helps your clients fix appointments and meetings with you online. Sagenda is available at absolutely NO COST for you or your clients! And the best thing about it is that you may have an unlimited number of bookings and/or customers. Our users always come first; that’s why Sagenda doesn’t display ads!

>[Contact & Support](http://www.sagenda.com/#contact "We love hearing from you!") | [YouTube Chanel](http://www.youtube.com/sagenda "Get a look at our tutorials!") | [Open an account](https://sagenda.net/Accounts/Register "Open a free account now!")

This is an “Online Booking System” which gives customers the opportunity to choose the date and the time of an appointment according to one's own preferences and the booking can now be done online.

Using this WP plugin is a better way to display your booking on your WP frontend than using an iFrame. Using this Plugin will required a free Sagenda's account. To **create an account** please visit: [https://sagenda.net/Accounts/Register](https://sagenda.net/Accounts/Register)

**NOTE: You need to register an account on the Sagenda site and then you will get an authentication code which you will use to validate your Sagenda plugin.**

**Shortcode**
You can use Sagenda as shortcode in any page or plugin :
[sagenda-wp] in a page or an article ( you can also display only one "bookable item" : [sagenda-wp bookableitem="my bookable item name"]).




SAGENDA WP PLUGIN 1.2.X REQUIRE PHP 5.6 or 7.x  !
FOR YOUR OWN SAFETY DON'T USE PHP VERSION OLDER THAN 5.6 THERE IS NO SECURITY PATCH -> http://php.net/supported-versions.php

=Installation=

How to install this booking plugin into my WordPress website?

[youtube https://www.youtube.com/watch?v=wCEmJg2hWgw]

How to create a Sagenda’s account in video?

[youtube https://www.youtube.com/watch?v=T-NXXxPSTQs]

Follow these steps to install Sagenda:

1. Download the booking plugin into the **/wp-content/plugins/** folder and activate the plugin.
2. Create a free account on https://sagenda.net/Accounts/Register (setup your “bookable items” and events).
3. Copy your token (from the backend of sagenda.net Settings / account settings) to your WordPress installation (backend of wp / Settings / Sagenda).
4. Use the shortcode [sagenda-wp] in a page or an article ( you can also display only one "bookable item" : [sagenda-wp bookableitem="my bookable item name"]).

SUPPORT THIPS : any error message? try to update to the last version of WordPress and use PHP 7 or higher !

= LANGUAGE / TRANSLATIONS =

  Chinese Simplified - 简体中文
  Chinese Traditional - 繁體中文
  Dutch - Nederlands (Nederland)
  English
  French - Français (France)
  German - Deutsch (Deutschland)
  Hindi - हिन्दी (भारत)
  Italian - Italiano (Italia)
  Japanese - 日本語
  Korean - 한국어
  Polish - Polski
  Portuguese - Português (Brasil)
  Portuguese - Português (Europeu)
  Romanian - Română (România)
  Russian - Русский
  Russian - Русский (Россия)
  Spanish - Español (España)
  Swedish - Svenska (Sverige)

Want more languages? Help us -> we re-builded the module from scratch : http://osp7icw.oneskyapp.com/admin/project/dashboard/project/101655

Are you a Dev and want to help? we are on GitHub : https://github.com/Sagenda/sagenda-wp


== Screenshots ==
1. How to identify my Sagenda account in WordPress? Copy the authentication code (token) from your Sagenda account and paste it into your WordPress installation

== Upgrade Notice ==
= 1.2.6 =
* IMPROVED : Dutch translations.
* FIXED : Improved message if event can't be paid.
* FIXED : Important bug in case of PayPal payment since last PayPal API update.
* ADDED : date / time format is now sync with WordPress settings. You can change the way sagenda display date and time by changing the settings of your WP website under : "Settings / General / Date Format + Time Format".
* TESTED : Compatibility with WP 4.7.5 and 4.7.4

== Changelog ==

= 1.2.5 =
* IMPROVED : Polish and Dutch translations.
* ADDED : warning message if hosting is running an older version that PHP 5.4.

= 1.2.4 =
* FIXED : Important bug when using several bookable items.

= 1.2.3 =
* BETA version.

= 1.2.2 =
* BETA version.

= 1.2.1 =
* ADDED : Pagination for your events (booking list).
* FIXED : A problem with a .js.
* IMPROVED : French and German translations.

= 1.2.0 =
* NOTICE : As we rebuilded everything from scratch you will have some translations missing, don't hesitate to add them on OneSky, we will push a new version every 2 weeks : http://osp7icw.oneskyapp.com/admin/project/dashboard/project/101655
* IMPROVED : Frontend layout using Twitter bootstrap.
* ADDED : Shortcode management to display only one bookable item, please just use it so : [sagenda-wp bookableitem="my bookable item name"]
* TESTED : Compatibility of the reservation plugin with WordPress 4.7.3


= 1.1.11 =
* IMPROVED : French translations.
* TESTED : Compatibility of the reservation plugin with WordPress 4.7

= 1.1.10 =
* FIXED : minor corrections

= 1.1.9 =
* ADDED : Finnish translations
* TESTED : Compatibility of the reservation plugin with WordPress 4.5.2

= 1.1.8 =
* IMPROVED : overall translations updated.
* TESTED : Compatibility of the reservation plugin with WordPress 4.5

= 1.1.7 =
* IMPROVED : Swedish translations of the booking form.

= 1.1.6 =
* FIXED : bug making the Polish date format not able to get free reservations.

= 1.1.5 =
* IMPROVED : Several URL and translations linked to sagenda’s account creation.
* ADDED : translation of the reservation datepicker to Polish.

= 1.1.4 =
* FIXED : Informative message when there is no event to display, was not translated. This is now fixed.
* ADDED : Added new complete Portuguese (Brazil) translations of Sagenda booking system.

= 1.1.3 =
* ADDED : Updated Swedish translation of the frontend PayPal payment of the booking system. Thanks to Patric!
* TESTED : Compatibility of the scheduling plugin with WordPress 4.4.2

= 1.1.2 =
* ADDED : Russian translation of the wp booking plugin frontend and backend, thanks to Дмитрий Воробьев!
* REMOVED : Events that should not be paid online are no more displayed as "Free events".


= 1.1.1 =
* ADDED : Korean translation of the wp booking plugin frontend and backend, thanks to 김현철!
* IMPROVED : Dutch translations of new payment part of the frontend booking plugin, thanks to Nico.


= 1.1.0 =
* ADDED : The booking plugin is now able to manage payment with PayPal.


= 1.0.20 =
* ADDED : New video "WordPress - How to add a free booking plugin in 2 min" : https://www.youtube.com/watch?v=wCEmJg2hWgw
* ADDED : Portuguese translation of the frontend reservation WP plugin.
* TESTED : Compatibility of the reservation plugin with WordPress 4.4.1


= 1.0.19 =
* ADDED : Dutch translation of the frontend and backend reservation WP plugin. (thanks to Nico!)
* ADDED : Portuguese translation of the frontend reservation WP plugin.

= 1.0.18 =
* ADDED : Spanish translation of the WordPress free plugin booking system.

= 1.0.17 =
* TESTED : Compatibility of the reservation plugin with WordPress 4.4

= 1.0.16 =
* TESTED : Compatibility of the reservation plugin with WordPress 4.3.1
* FIXED : a bug with datepicker selection of bookings.

= 1.0.15 =
* TESTED : Compatibility of the reservation plugin with WordPress 4.3.

= 1.0.14 =
* FIXED : a bug with the DIVI2 theme.
* TESTED : Compatibility of the reservation plugin with WordPress 4.2.4.

= 1.0.13 =
* IMPROVED : translations of the booking plugin (frontend).

= 1.0.12 =
* FIXED : a bug with reservation date selection on agenda date time picker on iOS devices and Safari navigators.

= 1.0.11 =
* IMPROVED : the rendering of the reservation date time picker.
* TESTED : Compatibility of the reservation system with WordPress 4.2.1 and WordPress 4.2.2.
* FIXED : Issue with picture animation of the theme Divi2.

= 1.0.10 =
* IMPROVED : Key of some translations.
* TESTED : Compatibility of the reservation system with WordPress 4.2

= 1.0.9 =
* IMPROVED : Compatibility of the booking system in case CURL is not activated.
* IMPROVED : Design of the date time picker.
* ADDED : Hindi translation of the WordPress plugin booking system.
* ADDED : Japanese translation of the WordPress plugin booking system.
* ADDED : Italian translation of the WordPress plugin booking system.
* ADDED : Chinese (Simplified) translation of the WordPress plugin booking system.

= 1.0.8 =
* ADDED : Add language support for Romanian to the reservation system! -> Sagenda este un sistem de rezervare gratuită
* IMPROVED : Translations (every language) : improved native text of the frontend online booking system.

= 1.0.7 =
* ADDED : Add language support for German to the reservation system! -> Sagenda ist eine kostenlose Reservierungssystem!
* IMPROVED : Translations -> Swedish : Sagenda är en fri bokningssystem.
* IMPROVED : Translations -> Polish : Sagenda to darmowy system rezerwacji!.
* IMPROVED : Translations -> French : Sagenda est un système gratuit de réservation.
* IMPROVED : Translations -> English : Sagenda is a free booking system.

= 1.0.6 =
* ADDED : Add language support for French to the reservation system.
* IMPROVED : Polish translation.

= 1.0.5 =
* ADDED : Add language support for polish (thanks to mraf).
* IMPROVED : By default the booking frontend module will already pre-select the next week.
* FIXED : Issue in highlighted dates in Sagenda booking module calendar.
* FIXED : Correct a bug happening in case of recursive booking event in the same date range.
* FIXED : Improved message displayed to user in case of error during the reservation.

= 1.0.4 =
* IMPROVED : Better way to call WebServices and give more input to the user in case of WebServices blocked by the hosting provider.

= 1.0.3 =
* IMPROVED : More details on the event is displayed on the free event list.

= 1.0.2 =
* FIXED : Fixed exception if WebServices can’t be reached.
* FIXED : Fixed several compatibility and layout problem with several themes. -> Sagenda is working fine but can’t test by ourself all hosting provider, theme, plugin compatibility… If you find an issue we will be happy to help you, please contact us via : http://www.sagenda.com/#contact

= 1.0.1 =
* FIXED :  Compatibility issues with several themes and plugins.

= 1.0.0 =
* First release

== Frequently Asked Questions ==


**Can I get a general overview?**
Yes, please read : [Introducing Sagenda](http://www.sagenda.com/introducing-sagenda/)

**Can I change the date / time format?**
You can change the way sagenda display date and time by changing the settings of your WP website under : "Settings / General / Date Format + Time Format". This is only valid for the WP plugin (not the iframe integration).

**How can I integrate it in on my WordPress website?**

1. By using iFrame, please read [http://www.sagenda.com/add-booking-system-website/](http://www.sagenda.com/add-booking-system-website/).
2. By using the native WordPress plugin, please read : [http://www.sagenda.com/add-booking-system-website/add-booking-plugin-wordpress-website/](http://www.sagenda.com/add-booking-system-website/add-booking-plugin-wordpress-website/)


**Do I need to create a new website for my patients to book online appointments with me?**
No. You don’t need a separate, new website; "Sagenda" can be integrated into any website, as a new page or in a new space. This online appointment scheduler fits very well into any kind of website using iframe or specific modules for CMS.
Please read : [How to add a booking system to my website?](http://www.sagenda.com/add-booking-system-website/)


**How does my client know of the status of his/her booking request?**
The online appointment scheduler sends personalized emails to all people concerned at every step of booking, confirmation or cancelling.


**But the services I offer are very different from those offered by other businesses.**
Whatever your services are, our online appointment scheduler can be configured in a manner that they can be easily displayed to your customers as a list of items. Try it, it's free!


**What if I have some feedback to improve your system?**
[Write to us NOW!](http://www.sagenda.com/#contact-us) Our online appointment scheduler is continually evolving, and your feedback is taken into account during every update.


**What about its compatibility of the booking system with my device?**
This brilliant online appointment scheduler works on PC, Mac, iPhone and Android. Whether your favorite browser is Firefox, Safari, Opera, Chrome or Internet Explorer, you will get optimum performance from the tool.


**Is that really free? And if yes, how are you making money then?**
Yes, this is really free. We make profit because some big customers ask us customized versions of our booking tool and additional software development or module.


**What is a "Bookable Item"?**
Bookable items represent the service or business that is available to customers for booking, renting or sharing online. For more information on please read our tutorial about [Bookable items](http://www.sagenda.com/introducing-sagenda/sagenda-bookable-items-can-clients-book/).


**How to setup event, schedule and repetition?**
This can be solved with "Events". For more information on please read our tutorial about [Events](http://www.sagenda.com/introducing-sagenda/sagenda-events-service-available-clients/).


**How to manage reservation (booking)?**
Once bookable items and events saved, you can manage your Bookings in the dashboard. For more information please read our tutorial about [dashboard](http://www.sagenda.com/introducing-sagenda/sagenda-dashboard-manage-clients/).


**How to configure my account?**
For more information please read our tutorial about [settings](http://www.sagenda.com/introducing-sagenda/sagenda-account-settings-integration/).

More on :
[Sagenda Home](http://www.sagenda.com/support-faqs/)
