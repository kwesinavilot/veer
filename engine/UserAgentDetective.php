<?php

class UserAgentDetective
{

    private $userAgent;
    private $browserName;
    private $browserVersion;
    private $operatingSystem;
    private $device;

    private $browserList = array(
        'Trident\/7.0' => 'Internet Explorer 11',
        'Beamrise' => 'Beamrise',
        'Opera' => 'Opera',
        'OPR' => 'Opera',
        'Shiira' => 'Shiira',
        'Chimera' => 'Chimera',
        'Phoenix' => 'Phoenix',
        'Firebird' => 'Firebird',
        'Camino' => 'Camino',
        'Netscape' => 'Netscape',
        'OmniWeb' => 'OmniWeb',
        'Konqueror' => 'Konqueror',
        'icab' => 'iCab',
        'Lynx' => 'Lynx',
        'Links' => 'Links',
        'hotjava' => 'HotJava',
        'amaya' => 'Amaya',
        'IBrowse' => 'IBrowse',
        'iTunes' => 'iTunes',
        'Silk' => 'Silk',
        'Dillo' => 'Dillo',
        'Maxthon' => 'Maxthon',
        'Arora' => 'Arora',
        'Galeon' => 'Galeon',
        'Iceape' => 'Iceape',
        'Iceweasel' => 'Iceweasel',
        'Midori' => 'Midori',
        'QupZilla' => 'QupZilla',
        'Namoroka' => 'Namoroka',
        'NetSurf' => 'NetSurf',
        'BOLT' => 'BOLT',
        'EudoraWeb' => 'EudoraWeb',
        'shadowfox' => 'ShadowFox',
        'Swiftfox' => 'Swiftfox',
        'Uzbl' => 'Uzbl',
        'UCBrowser' => 'UCBrowser',
        'Kindle' => 'Kindle',
        'wOSBrowser' => 'wOSBrowser',
        'Epiphany' => 'Epiphany',
        'SeaMonkey' => 'SeaMonkey',
        'Avant Browser' => 'Avant Browser',
        'Firefox' => 'Firefox',
        'Chrome' => 'Google Chrome',
        'MSIE' => 'Internet Explorer',
        'Internet Explorer' => 'Internet Explorer',
        'Safari' => 'Safari',
        'Mozilla' => 'Mozilla'
    );

    private $osList = array(
        'windows' => 'Windows',
        'iPad' => 'iPad',
        'iPod' => 'iPod',
        'iPhone' => 'iPhone',
        'mac' => 'Apple',
        'android' => 'Android',
        'linux' => 'Linux',
        'Nokia' => 'Nokia',
        'BlackBerry' => 'BlackBerry',
        'FreeBSD' => 'FreeBSD',
        'OpenBSD' => 'OpenBSD',
        'NetBSD' => 'NetBSD',
        'UNIX' => 'UNIX',
        'DragonFly' => 'DragonFlyBSD',
        'OpenSolaris' => 'OpenSolaris',
        'SunOS' => 'SunOS',
        'OS\/2' => 'OS/2',
        'BeOS' => 'BeOS',
        'win' => 'Windows',
        'Dillo' => 'Linux',
        'PalmOS' => 'PalmOS',
        'RebelMouse' => 'RebelMouse'
    );

    function __construct($user_agent = '')
    {
        if (empty($user_agent)) {
            $this->userAgent = (!empty($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : getenv('HTTP_USER_AGENT'));
        } else {
            $this->userAgent = $user_agent;
        }
    }

    function detect()
    {
        $this->detectBrowser();
        $this->detectPlatform();
        $this->detectDevice();

        return $this->getUserAgentInfo();
    }

    function detectBrowser()
    {
        foreach ($this->browserList as $pattern => $name) {
            if (preg_match("/" . $pattern . "/i", $this->userAgent, $match)) {
                $this->browserName = $name;
                // finally get the correct version number
                $known = array('Version', $pattern, 'other');

                $patternBrowserVersion = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';

                if (!preg_match_all($patternBrowserVersion, $this->userAgent, $matches)) {
                    // we have no matching number just continue
                }

                // see how many we have
                $i = count($matches['browser']);

                if ($i != 1) {
                    //we will have two since we are not using 'other' argument yet
                    //see if version is before or after the name
                    if (strripos($this->userAgent, "Version") < strripos($this->userAgent, $pattern)) {
                        @$this->browserVersion = $matches['version'][0];
                    } else {
                        @$this->browserVersion = $matches['version'][1];
                    }
                } else {
                    $this->browserVersion = $matches['version'][0];
                }

                break;
            }
        }
    }

    function detectPlatform()
    {
        foreach ($this->osList as $key => $platform) {
            if (stripos($this->userAgent, $key) !== false) {
                $this->operatingSystem = $platform;

                break;
            }
        }
    }

    function detectDevice() {
        if ($this->operatingSystem == "iPad|iPod|iPhone|Android|Nokia|BlackBerry") {
            $this->device = "Mobile";
        } else {
            $this->device = "Desktop";
        }
    }

    function getBrowser()
    {
        return $this->browserName;
    }

    function getVersion()
    {
        return $this->browserVersion;
    }

    function getPlatform()
    {
        return $this->operatingSystem;

    }

    function getDevice() {
        return $this->device;
    }

    function getUserAgent()
    {
        return $this->userAgent;
    }

    function getUserAgentInfo(): array
    {
        return [
            "browser" => $this->getBrowser(),
            "version" => $this->getVersion(),
            "os" => $this->getPlatform(),
            "device" => $this->getDevice(),
            "entire" => $this->userAgent
        ];
    }

    function toString(): string
    {
        return "<strong>Browser User Agent String:</strong> {$this->getUserAgent()}<br/>\n" .
            "<strong>Browser Name:</strong> {$this->getBrowser()}<br/>\n" .
            "<strong>Browser Version:</strong> {$this->getVersion()}<br/>\n" .
            "<strong>Platform:</strong> {$this->getPlatform()}<br/>" .
            "<strong>Device:</strong> {$this->getDevice()}<br/>";
    }
}