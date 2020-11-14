<?php
$global = parse_ini_file("./lang/settings/global.ini");

$email = $global['email'];
$phone = $global['phone'];
$adress = $global['adress'];
$version = $global['Version'];
$filename = $global['Filename'];
$path = $global['Path'];

$lang = $_COOKIE['lang'];

$normal = './lang/settings/settings.ini';
$en = './lang/settings/settings.en.ini';
$it = './lang/settings/settings.it.ini';
$de = './lang/settings/settings.de.ini';

if ($lang == "EN" and file_exists($en) and strlen(file_get_contents($en)) > "1200") {
   $ini = parse_ini_file($en);
   $htmllang = "en-EN";
} elseif ($lang == "DE" and file_exists($de) and strlen(file_get_contents($de)) > "1200") {
   $ini = parse_ini_file($de);
   $htmllang = "de-DE";
} elseif ($lang == "AT" and file_exists($de) and strlen(file_get_contents($de)) > "1200") {
   $ini = parse_ini_file($de);
   $htmllang = "de-AT";
} elseif ($lang == "IT" and file_exists($it) and strlen(file_get_contents($it)) > "1200") {
   $ini = parse_ini_file($it);
   $htmllang = "it";
} else {
   $ini = parse_ini_file($normal);
   $htmllang = "en";
}


class Cookie
{
   public $message;
}
class Navbar
{
   public $home;
   public $about;
   public $demo;
   public $download;
   public $contact;
}
//* Mobile Navbar
class MobileNav
{
   public $title;
   public $BtnGroup;
}
class mnlist1
{
   public $hub;
   public $news;
   public $faq;
   public $contact;
}
class mnlist2
{
   public $title;
   public $d;
   public $dl;
   public $ver;
   public $sav;
   public $doc;
}
class mv
{
   public $v;
   public $r;
   public $p;
   public $f;
   public $d;
   public $close;
}
class header
{
   public $text;
   public $down;
   public $af;
}
class button
{
   public $title;
   public $subitle;
}
class about
{
   public $title;
   public $text;
}
class download
{
   public $subitle;
   public $df;
}
class contact
{
   public $title;
   public $subtitle;
}
class form
{
   public $title;
   public $subtitle;
   public $firstname;
   public $lastname;
   public $email;
   public $reliable;
   public $msg;
   public $terms;
   public $newsletter;
}
class footer
{
   public $btn;
   public $item;
   public $policy;
   public $title;
   public $text;
}
class Fdownload
{
   public $title;
   public $ip;
   public $sl;
   public $f;
   public $member;
}
class footerA
{
   public $title;
}

$cookie = new Cookie();
$nav = new Navbar();
$MobileNav = new MobileNav();
$MobileNav->mnlist1 = new mnlist1();
$MobileNav->mnlist2 = new mnlist2();
$MobileNav->mv = new mv();
$header = new header();
$header->button = new button();
$about = new about();
$down = new download();
$contact = new contact();
$form = new form();
$footer = new footer();
$footer->download = new download();
$footer->a = new footerA();
//? COOKIE
$cookie->message = [$ini['cookie-text-1'] . '&nbsp;', $ini['cookie-text-2'], '&nbsp;' . $ini['cookie-text-3']];
$cookie->accept = $ini['cookie-accept'];
$cookie->decline = $ini['cookie-decline'];
//? NAVBAR
$nav->home = $ini['n-home'];
$nav->about = $ini['n-about'];
$nav->demo = $ini['n-demo'];
$nav->download = $ini['n-download'];
$nav->contact = $ini['n-contact'];
$MobileNav->title = $ini['mn-title'];
$MobileNav->btngroup = [$ini['mn-button-1'], $ini['mn-button-2']];
$MobileNav->mnlist1->hub = $ini['mn-list-item-1'];
$MobileNav->mnlist1->news = $ini['mn-list-item-2'];
$MobileNav->mnlist1->faq = $ini['mn-list-item-3'];
$MobileNav->mnlist1->contact = $ini['mn-list-item-4'];
$MobileNav->mnlist2->title = 'Yeeet It Out:';
$MobileNav->mnlist2->d = $ini['mn-list-item-5'];
$MobileNav->mnlist2->dl = $ini['mn-list-item-6'] . "&nbsp;";
$MobileNav->mnlist2->ver = $ini['mn-list-item-7'];
$MobileNav->mnlist2->sav = $ini['mn-list-item-8'];
$MobileNav->mnlist2->doc = $ini['mn-list-item-9'];
$MobileNav->mv->v = $ini['mv-item-1'];
$MobileNav->mv->r = $ini['mv-item-2'];
$MobileNav->mv->p = $ini['mv-item-3'];
$MobileNav->mv->f = $ini['mv-item-4'];
$MobileNav->mv->d = $ini['mv-item-5'];
$MobileNav->mv->close = $ini['mv-close'];
//? HEADER
$header->text = $ini['h-text'];
$header->button->title = $ini['h-button-1'];
$header->button->subtitle = $ini['h-button-2'] . '&nbsp;';
//? ABOUT
$about->title = $ini['a-title'];
$about->subtitle = $ini['a-subtitle'];
$about->headline = [$ini['a-headline-item-1'], $ini['a-headline-item-2'], $ini['a-headline-item-3']];
$about->text = [$ini['a-text-item-1'], $ini['a-text-item-2'], $ini['a-text-item-3']];
//? DOWNLOAD
$down->subtitle = $ini['d-subtitle'];
$down->df = $ini['d-subsubtitle'];
$down->nosupport = $ini['d-not-supportet'];
//?CONTACT
$contact->title = $ini['c-title'];
$contact->subtitle = $ini['c-subtitle'];
$form->firstname = $ini['c-firstname'];
$form->lastname = $ini['c-lastname'];
$form->email = $ini['c-email'];
$form->reliable = $ini['c-reliable'];
$form->msg = $ini['c-msg'];
$form->terms = $ini['c-terms'];
$form->newsletter = $ini['c-newsletter'];
$form->required = $ini['c-required'];
$form->submit = $ini['c-submit'];
//?FOOTER
$footer->btn = [$ini['f-btn-text-1'], $ini['f-btn-text-2']];
$footer->download->title = $ini['f-d-title'];
$footer->download->ip = $ini['f-d-ip'];
$footer->download->sl = [$ini['f-d-sl-1'], $ini['f-d-sl-2']];
$footer->download->f = $ini['f-d-founder'];
$footer->download->member = [$ini['f-d-member-1'], $ini['f-d-member-2']];
$footer->a->title = $ini['f-a-title'];
$footer->item = [$ini['f-a-item-1'], $ini['f-a-item-2'], $ini['f-a-item-3'], $ini['f-a-item-4']];
$footer->policy = [$ini['f-a-policy-1'], $ini['f-a-policy-2']];
$footer->title = $ini['f-title'];
$footer->text = $ini['f-text'];
