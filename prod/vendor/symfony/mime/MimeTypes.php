<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime;

use Symfony\Component\Mime\Exception\LogicException;

/**
 * Manages MIME types and file extensions.
 *
 * For MIME type guessing, you can register custom guessers
 * by calling the registerGuesser() method.
 * Custom guessers are always called before any default ones:
 *
 *     $guesser = new MimeTypes();
 *     $guesser->registerGuesser(new MyCustomMimeTypeGuesser());
 *
 * If you want to change the order of the default guessers, just re-register your
 * preferred one as a custom one. The last registered guesser is preferred over
 * previously registered ones.
 *
 * Re-registering a built-in guesser also allows you to configure it:
 *
 *     $guesser = new MimeTypes();
 *     $guesser->registerGuesser(new FileinfoMimeTypeGuesser('/path/to/magic/file'));
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
final class MimeTypes implements MimeTypesInterface
{
    private $extensions = [];
    private $mimeTypes = [];

    /**
     * @var MimeTypeGuesserInterface[]
     */
    private $guessers = [];
    private static $default;

    public function __construct(array $map = [])
    {
        foreach ($map as $mimeType => $extensions) {
            $this->extensions[$mimeType] = $extensions;

            foreach ($extensions as $extension) {
                $this->mimeTypes[$extension][] = $mimeType;
            }
        }
        $this->registerGuesser(new FileBinaryMimeTypeGuesser());
        $this->registerGuesser(new FileinfoMimeTypeGuesser());
    }

    public static function setDefault(self $default)
    {
        self::$default = $default;
    }

    public static function getDefault(): self
    {
        return self::$default ?? self::$default = new self();
    }

    /**
     * Registers a MIME type guesser.
     *
     * The last registered guesser has precedence over the other ones.
     */
    public function registerGuesser(MimeTypeGuesserInterface $guesser)
    {
        array_unshift($this->guessers, $guesser);
    }

    /**
     * {@inheritdoc}
     */
    public function getExtensions(string $mimeType): array
    {
        if ($this->extensions) {
            $extensions = $this->extensions[$mimeType] ?? $this->extensions[$lcMimeType = strtolower($mimeType)] ?? null;
        }

        return $extensions ?? self::$map[$mimeType] ?? self::$map[$lcMimeType ?? strtolower($mimeType)] ?? [];
    }

    /**
     * {@inheritdoc}
     */
    public function getMimeTypes(string $ext): array
    {
        if ($this->mimeTypes) {
            $mimeTypes = $this->mimeTypes[$ext] ?? $this->mimeTypes[$lcExt = strtolower($ext)] ?? null;
        }

        return $mimeTypes ?? self::$reverseMap[$ext] ?? self::$reverseMap[$lcExt ?? strtolower($ext)] ?? [];
    }

    /**
     * {@inheritdoc}
     */
    public function isGuesserSupported(): bool
    {
        foreach ($this->guessers as $guesser) {
            if ($guesser->isGuesserSupported()) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritdoc}
     *
     * The file is passed to each registered MIME type guesser in reverse order
     * of their registration (last registered is queried first). Once a guesser
     * returns a value that is not null, this method terminates and returns the
     * value.
     */
    public function guessMimeType(string $path): ?string
    {
        foreach ($this->guessers as $guesser) {
            if (!$guesser->isGuesserSupported()) {
                continue;
            }

            if (null !== $mimeType = $guesser->guessMimeType($path)) {
                return $mimeType;
            }
        }

        if (!$this->isGuesserSupported()) {
            throw new LogicException('Unable to guess the MIME type as no guessers are available (have you enable the php_fileinfo extension?).');
        }

        return null;
    }

    /**
     * A map of MIME types and their default extensions.
     *
     * Updated from upstream on 2019-01-16
     *
     * @see Resources/bin/update_mime_types.php
     */
    private static $map = [
        'application/acrobat' => ['pdf'],
        'application/andrew-inset' => ['ez'],
        'application/annodex' => ['anx'],
        'application/applixware' => ['aw'],
        'application/atom+xml' => ['atom'],
        'application/atomcat+xml' => ['atomcat'],
        'application/atomsvc+xml' => ['atomsvc'],
        'application/ccxml+xml' => ['ccxml'],
        'application/cdmi-capability' => ['cdmia'],
        'application/cdmi-container' => ['cdmic'],
        'application/cdmi-domain' => ['cdmid'],
        'application/cdmi-object' => ['cdmio'],
        'application/cdmi-queue' => ['cdmiq'],
        'application/cdr' => ['cdr'],
        'application/coreldraw' => ['cdr'],
        'application/cu-seeme' => ['cu'],
        'application/davmount+xml' => ['davmount'],
        'application/dbase' => ['dbf'],
        'application/dbf' => ['dbf'],
        'application/dicom' => ['dcm'],
        'application/docbook+xml' => ['dbk', 'docbook'],
        'application/dssc+der' => ['dssc'],
        'application/dssc+xml' => ['xdssc'],
        'application/ecmascript' => ['ecma', 'es'],
        'application/emf' => ['emf'],
        'application/emma+xml' => ['emma'],
        'application/epub+zip' => ['epub'],
        'application/exi' => ['exi'],
        'application/font-tdpfr' => ['pfr'],
        'application/font-woff' => ['woff'],
        'application/futuresplash' => ['swf', 'spl'],
        'application/geo+json' => ['geojson', 'geo.json'],
        'application/gml+xml' => ['gml'],
        'application/gnunet-directory' => ['gnd'],
        'application/gpx' => ['gpx'],
        'application/gpx+xml' => ['gpx'],
        'application/gxf' => ['gxf'],
        'application/gzip' => ['gz'],
        'application/hyperstudio' => ['stk'],
        'application/ico' => ['ico'],
        'application/ics' => ['vcs', 'ics'],
        'application/illustrator' => ['ai'],
        'application/inkml+xml' => ['ink', 'inkml'],
        'application/ipfix' => ['ipfix'],
        'application/java' => ['class'],
        'application/java-archive' => ['jar'],
        'application/java-byte-code' => ['class'],
        'application/java-serialized-object' => ['ser'],
        'application/java-vm' => ['class'],
        'application/javascript' => ['js', 'jsm', 'mjs'],
        'application/jrd+json' => ['jrd'],
        'application/json' => ['json'],
        'application/json-patch+json' => ['json-patch'],
        'application/jsonml+json' => ['jsonml'],
        'application/ld+json' => ['jsonld'],
        'application/lost+xml' => ['lostxml'],
        'application/lotus123' => ['123', 'wk1', 'wk3', 'wk4', 'wks'],
        'application/m3u' => ['m3u', 'm3u8', 'vlc'],
        'application/mac-binhex40' => ['hqx'],
        'application/mac-compactpro' => ['cpt'],
        'application/mads+xml' => ['mads'],
        'application/marc' => ['mrc'],
        'application/marcxml+xml' => ['mrcx'],
        'application/mathematica' => ['ma', 'nb', 'mb'],
        'application/mathml+xml' => ['mathml', 'mml'],
        'application/mbox' => ['mbox'],
        'application/mdb' => ['mdb'],
        'application/mediaservercontrol+xml' => ['mscml'],
        'application/metalink+xml' => ['metalink'],
        'application/metalink4+xml' => ['meta4'],
        'application/mets+xml' => ['mets'],
        'application/mods+xml' => ['mods'],
        'application/mp21' => ['m21', 'mp21'],
        'application/mp4' => ['mp4s'],
        'application/ms-tnef' => ['tnef', 'tnf'],
        'application/msaccess' => ['mdb'],
        'application/msexcel' => ['xls', 'xlc', 'xll', 'xlm', 'xlw', 'xla', 'xlt', 'xld'],
        'application/mspowerpoint' => ['ppz', 'ppt', 'pps', 'pot'],
        'application/msword' => ['doc', 'dot'],
        'application/msword-template' => ['dot'],
        'application/mxf' => ['mxf'],
        'application/nappdf' => ['pdf'],
        'application/octet-stream' => ['bin', 'dms', 'lrf', 'mar', 'so', 'dist', 'distz', 'pkg', 'bpk', 'dump', 'elc', 'deploy'],
        'application/oda' => ['oda'],
        'application/oebps-package+xml' => ['opf'],
        'application/ogg' => ['ogx'],
        'application/omdoc+xml' => ['omdoc'],
        'application/onenote' => ['onetoc', 'onetoc2', 'onetmp', 'onepkg'],
        'application/owl+xml' => ['owx'],
        'application/oxps' => ['oxps', 'xps'],
        'application/patch-ops-error+xml' => ['xer'],
        'application/pcap' => ['pcap', 'cap', 'dmp'],
        'application/pdf' => ['pdf'],
        'application/pgp' => ['pgp', 'gpg', 'asc'],
        'application/pgp-encrypted' => ['pgp', 'gpg', 'asc'],
        'application/pgp-keys' => ['skr', 'pkr', 'asc', 'pgp', 'gpg'],
        'application/pgp-signature' => ['asc', 'sig', 'pgp', 'gpg'],
        'application/photoshop' => ['psd'],
        'application/pics-rules' => ['prf'],
        'application/pkcs10' => ['p10'],
        'application/pkcs12' => ['p12', 'pfx'],
        'application/pkcs7-mime' => ['p7m', 'p7c'],
        'application/pkcs7-signature' => ['p7s'],
        'application/pkcs8' => ['p8'],
        'application/pkcs8-encrypted' => ['p8e'],
        'application/pkix-attr-cert' => ['ac'],
        'application/pkix-cert' => ['cer'],
        'application/pkix-crl' => ['crl'],
        'application/pkix-pkipath' => ['pkipath'],
        'application/pkixcmp' => ['pki'],
        'application/pls' => ['pls'],
        'application/pls+xml' => ['pls'],
        'application/postscript' => ['ai', 'eps', 'ps'],
        'application/powerpoint' => ['ppz', 'ppt', 'pps', 'pot'],
        'application/prs.cww' => ['cww'],
        'application/pskc+xml' => ['pskcxml'],
        'application/ram' => ['ram'],
        'application/raml+yaml' => ['raml'],
        'application/rdf+xml' => ['rdf', 'rdfs', 'owl'],
        'application/reginfo+xml' => ['rif'],
        'application/relax-ng-compact-syntax' => ['rnc'],
        'application/resource-lists+xml' => ['rl'],
        'application/resource-lists-diff+xml' => ['rld'],
        'application/rls-services+xml' => ['rs'],
        'application/rpki-ghostbusters' => ['gbr'],
        'application/rpki-manifest' => ['mft'],
        'application/rpki-roa' => ['roa'],
        'application/rsd+xml' => ['rsd'],
        'application/rss+xml' => ['rss'],
        'application/rtf' => ['rtf'],
        'application/sbml+xml' => ['sbml'],
        'application/scvp-cv-request' => ['scq'],
        'application/scvp-cv-response' => ['scs'],
        'application/scvp-vp-request' => ['spq'],
        'application/scvp-vp-response' => ['spp'],
        'application/sdp' => ['sdp'],
        'application/set-payment-initiation' => ['setpay'],
        'application/set-registration-initiation' => ['setreg'],
        'application/shf+xml' => ['shf'],
        'application/sieve' => ['siv'],
        'application/smil' => ['smil', 'smi', 'sml', 'kino'],
        'application/smil+xml' => ['smi', 'smil', 'sml', 'kino'],
        'application/sparql-query' => ['rq'],
        'application/sparql-results+xml' => ['srx'],
        'application/sql' => ['sql'],
        'application/srgs' => ['gram'],
        'application/srgs+xml' => ['grxml'],
        'application/sru+xml' => ['sru'],
        'application/ssdl+xml' => ['ssdl'],
        'application/ssml+xml' => ['ssml'],
        'application/stuffit' => ['sit'],
        'application/tei+xml' => ['tei', 'teicorpus'],
        'application/thraud+xml' => ['tfi'],
        'application/timestamped-data' => ['tsd'],
        'application/trig' => ['trig'],
        'application/vnd.3gpp.pic-bw-large' => ['plb'],
        'application/vnd.3gpp.pic-bw-small' => ['psb'],
        'application/vnd.3gpp.pic-bw-var' => ['pvb'],
        'application/vnd.3gpp2.tcap' => ['tcap'],
        'application/vnd.3m.post-it-notes' => ['pwn'],
        'application/vnd.accpac.simply.aso' => ['aso'],
        'application/vnd.accpac.simply.imp' => ['imp'],
        'application/vnd.acucobol' => ['acu'],
        'application/vnd.acucorp' => ['atc', 'acutc'],
        'application/vnd.adobe.air-application-installer-package+zip' => ['air'],
        'application/vnd.adobe.flash.movie' => ['swf', 'spl'],
        'application/vnd.adobe.formscentral.fcdt' => ['fcdt'],
        'application/vnd.adobe.fxp' => ['fxp', 'fxpl'],
        'application/vnd.adobe.illustrator' => ['ai'],
        'application/vnd.adobe.xdp+xml' => ['xdp'],
        'application/vnd.adobe.xfdf' => ['xfdf'],
        'application/vnd.ahead.space' => ['ahead'],
        'application/vnd.airzip.filesecure.azf' => ['azf'],
        'application/vnd.airzip.filesecure.azs' => ['azs'],
        'application/vnd.amazon.ebook' => ['azw'],
        'application/vnd.americandynamics.acc' => ['acc'],
        'application/vnd.amiga.ami' => ['ami'],
        'application/vnd.android.package-archive' => ['apk'],
        'application/vnd.anser-web-certificate-issue-initiation' => ['cii'],
        'application/vnd.anser-web-funds-transfer-initiation' => ['fti'],
        'application/vnd.antix.game-component' => ['atx'],
        'application/vnd.appimage' => ['appimage'],
        'application/vnd.apple.installer+xml' => ['mpkg'],
        'application/vnd.apple.keynote' => ['key'],
        'application/vnd.apple.mpegurl' => ['m3u8', 'm3u'],
        'application/vnd.aristanetworks.swi' => ['swi'],
        'application/vnd.astraea-software.iota' => ['iota'],
        'application/vnd.audiograph' => ['aep'],
        'application/vnd.blueice.multipass' => ['mpm'],
        'application/vnd.bmi' => ['bmi'],
        'application/vnd.businessobjects' => ['rep'],
        'application/vnd.chemdraw+xml' => ['cdxml'],
        'application/vnd.chess-pgn' => ['pgn'],
        'application/vnd.chipnuts.karaoke-mmd' => ['mmd'],
        'application/vnd.cinderella' => ['cdy'],
        'application/vnd.claymore' => ['cla'],
        'application/vnd.cloanto.rp9' => ['rp9'],
        'application/vnd.clonk.c4group' => ['c4g', 'c4d', 'c4f', 'c4p', 'c4u'],
        'application/vnd.cluetrust.cartomobile-config' => ['c11amc'],
        'application/vnd.cluetrust.cartomobile-config-pkg' => ['c11amz'],
        'application/vnd.coffeescript' => ['coffee'],
        'application/vnd.comicbook+zip' => ['cbz'],
        'application/vnd.comicbook-rar' => ['cbr'],
        'application/vnd.commonspace' => ['csp'],
        'application/vnd.contact.cmsg' => ['cdbcmsg'],
        'application/vnd.corel-draw' => ['cdr'],
        'application/vnd.cosmocaller' => ['cmc'],
        'application/vnd.crick.clicker' => ['clkx'],
        'application/vnd.crick.clicker.keyboard' => ['clkk'],
        'application/vnd.crick.clicker.palette' => ['clkp'],
        'application/vnd.crick.clicker.template' => ['clkt'],
        'application/vnd.crick.clicker.wordbank' => ['clkw'],
        'application/vnd.criticaltools.wbs+xml' => ['wbs'],
        'application/vnd.ctc-posml' => ['pml'],
        'application/vnd.cups-ppd' => ['ppd'],
        'application/vnd.curl.car' => ['car'],
        'application/vnd.curl.pcurl' => ['pcurl'],
        'application/vnd.dart' => ['dart'],
        'application/vnd.data-vision.rdz' => ['rdz'],
        'application/vnd.debian.binary-package' => ['deb', 'udeb'],
        'application/vnd.dece.data' => ['uvf', 'uvvf', 'uvd', 'uvvd'],
        'application/vnd.dece.ttml+xml' => ['uvt', 'uvvt'],
        'application/vnd.dece.unspecified' => ['uvx', 'uvvx'],
        'application/vnd.dece.zip' => ['uvz', 'uvvz'],
        'application/vnd.denovo.fcselayout-link' => ['fe_launch'],
        'application/vnd.dna' => ['dna'],
        'application/vnd.dolby.mlp' => ['mlp'],
        'application/vnd.dpgraph' => ['dpg'],
        'application/vnd.dreamfactory' => ['dfac'],
        'application/vnd.ds-keypoint' => ['kpxx'],
        'application/vnd.dvb.ait' => ['ait'],
        'application/vnd.dvb.service' => ['svc'],
        'application/vnd.dynageo' => ['geo'],
        'application/vnd.ecowin.chart' => ['mag'],
        'application/vnd.emusic-emusic_package' => ['emp'],
        'application/vnd.enliven' => ['nml'],
        'application/vnd.epson.esf' => ['esf'],
        'application/vnd.epson.msf' => ['msf'],
        'application/vnd.epson.quickanime' => ['qam'],
        'application/vnd.epson.salt' => ['slt'],
        'application/vnd.epson.ssf' => ['ssf'],
        'application/vnd.eszigno3+xml' => ['es3', 'et3'],
        'application/vnd.ezpix-album' => ['ez2'],
        'application/vnd.ezpix-package' => ['ez3'],
        'application/vnd.fdf' => ['fdf'],
        'application/vnd.fdsn.mseed' => ['mseed'],
        'application/vnd.fdsn.seed' => ['seed', 'dataless'],
        'application/vnd.flatpak' => ['flatpak', 'xdgapp'],
        'application/vnd.flatpak.ref' => ['flatpakref'],
        'application/vnd.flatpak.repo' => ['flatpakrepo'],
        'application/vnd.flographit' => ['gph'],
        'application/vnd.fluxtime.clip' => ['ftc'],
        'application/vnd.framemaker' => ['fm', 'frame', 'maker', 'book'],
        'application/vnd.frogans.fnc' => ['fnc'],
        'application/vnd.frogans.ltf' => ['ltf'],
        'application/vnd.fsc.weblaunch' => ['fsc'],
        'application/vnd.fujitsu.oasys' => ['oas'],
        'application/vnd.fujitsu.oasys2' => ['oa2'],
        'application/vnd.fujitsu.oasys3' => ['oa3'],
        'application/vnd.fujitsu.oasysgp' => ['fg5'],
        'application/vnd.fujitsu.oasysprs' => ['bh2'],
        'application/vnd.fujixerox.ddd' => ['ddd'],
        'application/vnd.fujixerox.docuworks' => ['xdw'],
        'application/vnd.fujixerox.docuworks.binder' => ['xbd'],
        'application/vnd.fuzzysheet' => ['fzs'],
        'application/vnd.genomatix.tuxedo' => ['txd'],
        'application/vnd.geo+json' => ['geojson', 'geo.json'],
        'application/vnd.geogebra.file' => ['ggb'],
        'application/vnd.geogebra.tool' => ['ggt'],
        'application/vnd.geometry-explorer' => ['gex', 'gre'],
        'application/vnd.geonext' => ['gxt'],
        'application/vnd.geoplan' => ['g2w'],
        'application/vnd.geospace' => ['g3w'],
        'application/vnd.gmx' => ['gmx'],
        'application/vnd.google-earth.kml+xml' => ['kml'],
        'application/vnd.google-earth.kmz' => ['kmz'],
        'application/vnd.grafeq' => ['gqf', 'gqs'],
        'application/vnd.groove-account' => ['gac'],
        'application/vnd.groove-help' => ['ghf'],
        'application/vnd.groove-identity-message' => ['gim'],
        'application/vnd.groove-injector' => ['grv'],
        'application/vnd.groove-tool-message' => ['gtm'],
        'application/vnd.groove-tool-template' => ['tpl'],
        'application/vnd.groove-vcard' => ['vcg'],
        'application/vnd.haansoft-hwp' => ['hwp'],
        'application/vnd.haansoft-hwt' => ['hwt'],
        'application/vnd.hal+xml' => ['hal'],
        'application/vnd.handheld-entertainment+xml' => ['zmm'],
        'application/vnd.hbci' => ['hbci'],
        'application/vnd.hhe.lesson-player' => ['les'],
        'application/vnd.hp-hpgl' => ['hpgl'],
        'application/vnd.hp-hpid' => ['hpid'],
        'application/vnd.hp-hps' => ['hps'],
        'application/vnd.hp-jlyt' => ['jlt'],
        'application/vnd.hp-pcl' => ['pcl'],
        'application/vnd.hp-pclxl' => ['pclxl'],
        'application/vnd.hydrostatix.sof-data' => ['sfd-hdstx'],
        'application/vnd.ibm.minipay' => ['mpy'],
        'application/vnd.ibm.modcap' => ['afp', 'listafp', 'list3820'],
        'application/vnd.ibm.rights-management' => ['irm'],
        'application/vnd.ibm.secure-container' => ['sc'],
        'application/vnd.iccprofile' => ['icc', 'icm'],
        'application/vnd.igloader' => ['igl'],
        'application/vnd.immervision-ivp' => ['ivp'],
        'application/vnd.immervision-ivu' => ['ivu'],
        'application/vnd.insors.igm' => ['igm'],
        'application/vnd.intercon.formnet' => ['xpw', 'xpx'],
        'application/vnd.intergeo' => ['i2g'],
        'application/vnd.intu.qbo' => ['qbo'],
        'application/vnd.intu.qfx' => ['qfx'],
        'application/vnd.ipunplugged.rcprofile' => ['rcprofile'],
        'application/vnd.irepository.package+xml' => ['irp'],
        'application/vnd.is-xpr' => ['xpr'],
        'application/vnd.isac.fcs' => ['fcs'],
        'application/vnd.jam' => ['jam'],
        'application/vnd.jcp.javame.midlet-rms' => ['rms'],
        'application/vnd.jisp' => ['jisp'],
        'application/vnd.joost.joda-archive' => ['joda'],
        'application/vnd.kahootz' => ['ktz', 'ktr'],
        'application/vnd.kde.karbon' => ['karbon'],
        'application/vnd.kde.kchart' => ['chrt'],
        'application/vnd.kde.kformula' => ['kfo'],
        'application/vnd.kde.kivio' => ['flw'],
        'application/vnd.kde.kontour' => ['kon'],
        'application/vnd.kde.kpresenter' => ['kpr', 'kpt'],
        'application/vnd.kde.kspread' => ['ksp'],
        'application/vnd.kde.kword' => ['kwd', 'kwt'],
        'application/vnd.kenameaapp' => ['htke'],
        'application/vnd.kidspiration' => ['kia'],
        'application/vnd.kinar' => ['kne', 'knp'],
        'application/vnd.koan' => ['skp', 'skd', 'skt', 'skm'],
        'application/vnd.kodak-descriptor' => ['sse'],
        'application/vnd.las.las+xml' => ['lasxml'],
        'application/vnd.llamagraphics.life-balance.desktop' => ['lbd'],
        'application/vnd.llamagraphics.life-balance.exchange+xml' => ['lbe'],
        'application/vnd.lotus-1-2-3' => ['123', 'wk1', 'wk3', 'wk4', 'wks'],
        'application/vnd.lotus-approach' => ['apr'],
        'application/vnd.lotus-freelance' => ['pre'],
        'application/vnd.lotus-notes' => ['nsf'],
        'application/vnd.lotus-organizer' => ['org'],
        'application/vnd.lotus-screencam' => ['scm'],
        'application/vnd.lotus-wordpro' => ['lwp'],
        'application/vnd.macports.portpkg' => ['portpkg'],
        'application/vnd.mcd' => ['mcd'],
        'application/vnd.medcalcdata' => ['mc1'],
        'application/vnd.mediastation.cdkey' => ['cdkey'],
        'application/vnd.mfer' => ['mwf'],
        'application/vnd.mfmp' => ['mfm'],
        'application/vnd.micrografx.flo' => ['flo'],
        'application/vnd.micrografx.igx' => ['igx'],
        'application/vnd.mif' => ['mif'],
        'application/vnd.mobius.daf' => ['daf'],
        'application/vnd.mobius.dis' => ['dis'],
        'application/vnd.mobius.mbk' => ['mbk'],
        'application/vnd.mobius.mqy' => ['mqy'],
        'application/vnd.mobius.msl' => ['msl'],
        'application/vnd.mobius.plc' => ['plc'],
        'application/vnd.mobius.txf' => ['txf'],
        'application/vnd.mophun.application' => ['mpn'],
        'application/vnd.mophun.certificate' => ['mpc'],
        'application/vnd.mozilla.xul+xml' => ['xul'],
        'application/vnd.ms-access' => ['mdb'],
        'application/vnd.ms-artgalry' => ['cil'],
        'application/vnd.ms-asf' => ['asf'],
        'application/vnd.ms-cab-compressed' => ['cab'],
        'application/vnd.ms-excel' => ['xls', 'xlm', 'xla', 'xlc', 'xlt', 'xlw', 'xll', 'xld'],
        'application/vnd.ms-excel.addin.macroenabled.12' => ['xlam'],
        'application/vnd.ms-excel.sheet.binary.macroenabled.12' => ['xlsb'],
        'application/vnd.ms-excel.sheet.macroenabled.12' => ['xlsm'],
        'application/vnd.ms-excel.template.macroenabled.12' => ['xltm'],
        'application/vnd.ms-fontobject' => ['eot'],
        'application/vnd.ms-htmlhelp' => ['chm'],
        'application/vnd.ms-ims' => ['ims'],
        'application/vnd.ms-lrm' => ['lrm'],
        'application/vnd.ms-officetheme' => ['thmx'],
        'application/vnd.ms-outlook' => ['msg'],
        'application/vnd.ms-pki.seccat' => ['cat'],
        'application/vnd.ms-pki.stl' => ['stl'],
        'application/vnd.ms-powerpoint' => ['ppt', 'pps', 'pot', 'ppz'],
        'application/vnd.ms-powerpoint.addin.macroenabled.12' => ['ppam'],
        'application/vnd.ms-powerpoint.presentation.macroenabled.12' => ['pptm'],
        'application/vnd.ms-powerpoint.slide.macroenabled.12' => ['sldm'],
        'application/vnd.ms-powerpoint.slideshow.macroenabled.12' => ['ppsm'],
        'application/vnd.ms-powerpoint.template.macroenabled.12' => ['potm'],
        'application/vnd.ms-project' => ['mpp', 'mpt'],
        'application/vnd.ms-publisher' => ['pub'],
        'application/vnd.ms-tnef' => ['tnef', 'tnf'],
        'application/vnd.ms-visio.drawing.macroenabled.main+xml' => ['vsdm'],
        'application/vnd.ms-visio.drawing.main+xml' => ['vsdx'],
        'application/vnd.ms-visio.stencil.macroenabled.main+xml' => ['vssm'],
        'application/vnd.ms-visio.stencil.main+xml' => ['vssx'],
        'application/vnd.ms-visio.template.macroenabled.main+xml' => ['vstm'],
        'application/vnd.ms-visio.template.main+xml' => ['vstx'],
        'application/vnd.ms-word' => ['doc'],
        'application/vnd.ms-word.document.macroenabled.12' => ['docm'],
        'application/vnd.ms-word.template.macroenabled.12' => ['dotm'],
        'application/vnd.ms-works' => ['wps', 'wks', 'wcm', 'wdb', 'xlr'],
        'application/vnd.ms-wpl' => ['wpl'],
        'application/vnd.ms-xpsdocument' => ['xps', 'oxps'],
        'application/vnd.msaccess' => ['mdb'],
        'application/vnd.mseq' => ['mseq'],
        'application/vnd.musician' => ['mus'],
        'application/vnd.muvee.style' => ['msty'],
        'application/vnd.mynfc' => ['taglet'],
        'application/vnd.neurolanguage.nlu' => ['nlu'],
        'application/vnd.nintendo.snes.rom' => ['sfc', 'smc'],
        'application/vnd.nitf' => ['ntf', 'nitf'],
        'application/vnd.noblenet-directory' => ['nnd'],
        'application/vnd.noblenet-sealer' => ['nns'],
        'application/vnd.noblenet-web' => ['nnw'],
        'application/vnd.nokia.n-gage.data' => ['ngdat'],
        'application/vnd.nokia.n-gage.symbian.install' => ['n-gage'],
        'application/vnd.nokia.radio-preset' => ['rpst'],
        'application/vnd.nokia.radio-presets' => ['rpss'],
        'application/vnd.novadigm.edm' => ['edm'],
        'application/vnd.novadigm.edx' => ['edx'],
        'application/vnd.novadigm.ext' => ['ext'],
        'application/vnd.oasis.docbook+xml' => ['dbk', 'docbook'],
        'application/vnd.oasis.opendocument.chart' => ['odc'],
        'application/vnd.oasis.opendocument.chart-template' => ['otc'],
        'application/vnd.oasis.opendocument.database' => ['odb'],
        'application/vnd.oasis.opendocument.formula' => ['odf'],
        'application/vnd.oasis.opendocument.formula-template' => ['odft', 'otf'],
        'application/vnd.oasis.opendocument.graphics' => ['odg'],
        'application/vnd.oasis.opendocument.graphics-flat-xml' => ['fodg'],
        'application/vnd.oasis.opendocument.graphics-template' => ['otg'],
        'application/vnd.oasis.opendocument.image' => ['odi'],
        'application/vnd.oasis.opendocument.image-template' => ['oti'],
        'application/vnd.oasis.opendocument.presentation' => ['odp'],
        'application/vnd.oasis.opendocument.presentation-flat-xml' => ['fodp'],
        'application/vnd.oasis.opendocument.presentation-template' => ['otp'],
        'application/vnd.oasis.opendocument.spreadsheet' => ['ods'],
        'application/vnd.oasis.opendocument.spreadsheet-flat-xml' => ['fods'],
        'application/vnd.oasis.opendocument.spreadsheet-template' => ['ots'],
        'application/vnd.oasis.opendocument.text' => ['odt'],
        'application/vnd.oasis.opendocument.text-flat-xml' => ['fodt'],
        'application/vnd.oasis.opendocument.text-master' => ['odm'],
        'application/vnd.oasis.opendocument.text-template' => ['ott'],
        'application/vnd.oasis.opendocument.text-web' => ['oth'],
        'application/vnd.olpc-sugar' => ['xo'],
        'application/vnd.oma.dd2+xml' => ['dd2'],
        'application/vnd.openofficeorg.extension' => ['oxt'],
        'application/vnd.openxmlformats-officedocument.presentationml.presentation' => ['pptx'],
        'application/vnd.openxmlformats-officedocument.presentationml.slide' => ['sldx'],
        'application/vnd.openxmlformats-officedocument.presentationml.slideshow' => ['ppsx'],
        'application/vnd.openxmlformats-officedocument.presentationml.template' => ['potx'],
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => ['xlsx'],
        'application/vnd.openxmlformats-officedocument.spreadsheetml.template' => ['xltx'],
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => ['docx'],
        'application/vnd.openxmlformats-officedocument.wordprocessingml.template' => ['dotx'],
        'application/vnd.osgeo.mapguide.package' => ['mgp'],
        'application/vnd.osgi.dp' => ['dp'],
        'application/vnd.osgi.subsystem' => ['esa'],
        'application/vnd.palm' => ['pdb', 'pqa', 'oprc', 'prc'],
        'application/vnd.pawaafile' => ['paw'],
        'application/vnd.pg.format' => ['str'],
        'application/vnd.pg.osasli' => ['ei6'],
        'application/vnd.picsel' => ['efif'],
        'application/vnd.pmi.widget' => ['wg'],
        'application/vnd.pocketlearn' => ['plf'],
        'application/vnd.powerbuilder6' => ['pbd'],
        'application/vnd.previewsystems.box' => ['box'],
        'application/vnd.proteus.magazine' => ['mgz'],
        'application/vnd.publishare-delta-tree' => ['qps'],
        'application/vnd.pvi.ptid1' => ['ptid'],
        'application/vnd.quark.quarkxpress' => ['qxd', 'qxt', 'qwd', 'qwt', 'qxl', 'qxb'],
        'application/vnd.rar' => ['rar'],
        'application/vnd.realvnc.bed' => ['bed'],
        'application/vnd.recordare.musicxml' => ['mxl'],
        'application/vnd.recordare.musicxml+xml' => ['musicxml'],
        'application/vnd.rig.cryptonote' => ['cryptonote'],
        'application/vnd.rim.cod' => ['cod'],
        'application/vnd.rn-realmedia' => ['rm', 'rmj', 'rmm', 'rms', 'rmx', 'rmvb'],
        'application/vnd.rn-realmedia-vbr' => ['rmvb', 'rm', 'rmj', 'rmm', 'rms', 'rmx'],
        'application/vnd.route66.link66+xml' => ['link66'],
        'application/vnd.sailingtracker.track' => ['st'],
        'application/vnd.sdp' => ['sdp'],
        'application/vnd.seemail' => ['see'],
        'application/vnd.sema' => ['sema'],
        'application/vnd.semd' => ['semd'],
        'application/vnd.semf' => ['semf'],
        'application/vnd.shana.informed.formdata' => ['ifm'],
        'application/vnd.shana.informed.formtemplate' => ['itp'],
        'application/vnd.shana.informed.interchange' => ['iif'],
        'application/vnd.shana.informed.package' => ['ipk'],
        'application/vnd.simtech-mindmapper' => ['twd', 'twds'],
        'application/vnd.smaf' => ['mmf', 'smaf'],
        'application/vnd.smart.teacher' => ['teacher'],
        'application/vnd.snap' => ['snap'],
        'application/vnd.solent.sdkm+xml' => ['sdkm', 'sdkd'],
        'application/vnd.spotfire.dxp' => ['dxp'],
        'application/vnd.spotfire.sfs' => ['sfs'],
        'application/vnd.sqlite3' => ['sqlite3'],
        'application/vnd.squashfs' => ['sqsh'],
        'application/vnd.stardivision.calc' => ['sdc'],
        'application/vnd.stardivision.chart' => ['sds'],
        'application/vnd.stardivision.draw' => ['sda'],
        'application/vnd.stardivision.impress' => ['sdd', 'sdp'],
        'application/vnd.stardivision.mail' => ['smd'],
        'application/vnd.stardivision.math' => ['smf'],
        'application/vnd.stardivision.writer' => ['sdw', 'vor', 'sgl'],
        'application/vnd.stardivision.writer-global' => ['sgl', 'sdw', 'vor'],
        'application/vnd.stepmania.package' => ['smzip'],
        'application/vnd.stepmania.stepchart' => ['sm'],
        'application/vnd.sun.xml.base' => ['odb'],
        'application/vnd.sun.xml.calc' => ['sxc'],
        'application/vnd.sun.xml.calc.template' => ['stc'],
        'application/vnd.sun.xml.draw' => ['sxd'],
        'application/vnd.sun.xml.draw.template' => ['std'],
        'application/vnd.sun.xml.impress' => ['sxi'],
        'application/vnd.sun.xml.impress.template' => ['sti'],
        'application/vnd.sun.xml.math' => ['sxm'],
        'application/vnd.sun.xml.writer' => ['sxw'],
        'application/vnd.sun.xml.writer.global' => ['sxg'],
        'application/vnd.sun.xml.writer.template' => ['stw'],
        'application/vnd.sus-calendar' => ['sus', 'susp'],
        'application/vnd.svd' => ['svd'],
        'application/vnd.symbian.install' => ['sis', 'sisx'],
        'application/vnd.syncml+xml' => ['xsm'],
        'application/vnd.syncml.dm+wbxml' => ['bdm'],
        'application/vnd.syncml.dm+xml' => ['xdm'],
        'application/vnd.tao.intent-module-archive' => ['tao'],
        'application/vnd.tcpdump.pcap' => ['pcap', 'cap', 'dmp'],
        'application/vnd.tmobile-livetv' => ['tmo'],
        'application/vnd.trid.tpt' => ['tpt'],
        'application/vnd.triscape.mxs' => ['mxs'],
        'application/vnd.trueapp' => ['tra'],
        'application/vnd.ufdl' => ['ufd', 'ufdl'],
        'application/vnd.uiq.theme' => ['utz'],
        'application/vnd.umajin' => ['umj'],
        'application/vnd.unity' => ['unityweb'],
        'application/vnd.uoml+xml' => ['uoml'],
        'application/vnd.vcx' => ['vcx'],
        'application/vnd.visio' => ['vsd', 'vst', 'vss', 'vsw'],
        'application/vnd.visionary' => ['vis'],
        'application/vnd.vsf' => ['vsf'],
        'application/vnd.wap.wbxml' => ['wbxml'],
        'application/vnd.wap.wmlc' => ['wmlc'],
        'application/vnd.wap.wmlscriptc' => ['wmlsc'],
        'application/vnd.webturbo' => ['wtb'],
        'application/vnd.wolfram.player' => ['nbp'],
        'application/vnd.wordperfect' => ['wpd', 'wp', 'wp4', 'wp5', 'wp6', 'wpp'],
        'application/vnd.wqd' => ['wqd'],
        'application/vnd.wt.stf' => ['stf'],
        'application/vnd.xara' => ['xar'],
        'application/vnd.xdgapp' => ['flatpak', 'xdgapp'],
        'application/vnd.xfdl' => ['xfdl'],
        'application/vnd.yamaha.hv-dic' => ['hvd'],
        'application/vnd.yamaha.hv-script' => ['hvs'],
        'application/vnd.yamaha.hv-voice' => ['hvp'],
        'application/vnd.yamaha.openscoreformat' => ['osf'],
        'application/vnd.yamaha.openscoreformat.osfpvg+xml' => ['osfpvg'],
        'application/vnd.yamaha.smaf-audio' => ['saf'],
        'application/vnd.yamaha.smaf-phrase' => ['spf'],
        'application/vnd.yellowriver-custom-menu' => ['cmp'],
        'application/vnd.youtube.yt' => ['yt'],
        'application/vnd.zul' => ['zir', 'zirz'],
        'application/vnd.zzazz.deck+xml' => ['zaz'],
        'application/voicexml+xml' => ['vxml'],
        'application/widget' => ['wgt'],
        'application/winhlp' => ['hlp'],
        'application/wk1' => ['123', 'wk1', 'wk3', 'wk4', 'wks'],
        'application/wmf' => ['wmf'],
        'application/wordperfect' => ['wp', 'wp4', 'wp5', 'wp6', 'wpd', 'wpp'],
        'application/wsdl+xml' => ['wsdl'],
        'application/wspolicy+xml' => ['wspolicy'],
        'application/wwf' => ['wwf'],
        'application/x-123' => ['123', 'wk1', 'wk3', 'wk4', 'wks'],
        'application/x-7z-compressed' => ['7z'],
        'application/x-abiword' => ['abw', 'abw.CRASHED', 'abw.gz', 'zabw'],
        'application/x-ace' => ['ace'],
        'application/x-ace-compressed' => ['ace'],
        'application/x-alz' => ['alz'],
        'application/x-amiga-disk-format' => ['adf'],
        'application/x-amipro' => ['sam'],
        'application/x-annodex' => ['anx'],
        'application/x-aportisdoc' => ['pdb', 'pdc'],
        'application/x-apple-diskimage' => ['dmg'],
        'application/x-applix-spreadsheet' => ['as'],
        'application/x-applix-word' => ['aw'],
        'application/x-archive' => ['a', 'ar'],
        'application/x-arj' => ['arj'],
        'application/x-asp' => ['asp'],
        'application/x-atari-2600-rom' => ['a26'],
        'application/x-atari-7800-rom' => ['a78'],
        'application/x-atari-lynx-rom' => ['lnx'],
        'application/x-authorware-bin' => ['aab', 'x32', 'u32', 'vox'],
        'application/x-authorware-map' => ['aam'],
        'application/x-authorware-seg' => ['aas'],
        'application/x-awk' => ['awk'],
        'application/x-bcpio' => ['bcpio'],
        'application/x-bittorrent' => ['torrent'],
        'application/x-blender' => ['blender', 'blend', 'BLEND'],
        'application/x-blorb' => ['blb', 'blorb'],
        'application/x-bsdiff' => ['bsdiff'],
        'application/x-bzdvi' => ['dvi.bz2'],
        'application/x-bzip' => ['bz', 'bz2'],
        'application/x-bzip-compressed-tar' => ['tar.bz2', 'tar.bz', 'tbz2', 'tbz', 'tb2'],
        'application/x-bzip2' => ['bz2', 'boz', 'bz'],
        'application/x-bzpdf' => ['pdf.bz2'],
        'application/x-bzpostscript' => ['ps.bz2'],
        'application/x-cb7' => ['cb7'],
        'application/x-cbr' => ['cbr', 'cba', 'cbt', 'cbz', 'cb7'],
        'application/x-cbt' => ['cbt'],
        'application/x-cbz' => ['cbz'],
        'application/x-ccmx' => ['ccmx'],
        'application/x-cd-image' => ['iso', 'iso9660'],
        'application/x-cdlink' => ['vcd'],
        'application/x-cdr' => ['cdr'],
        'application/x-cdrdao-toc' => ['toc'],
        'application/x-cfs-compressed' => ['cfs'],
        'application/x-chat' => ['chat'],
        'application/x-chess-pgn' => ['pgn'],
        'application/x-chm' => ['chm'],
        'application/x-cisco-vpn-settings' => ['pcf'],
        'application/x-compress' => ['Z'],
        'application/x-compressed-tar' => ['tar.gz', 'tgz'],
        'application/x-conference' => ['nsc'],
        'application/x-coreldraw' => ['cdr'],
        'application/x-cpio' => ['cpio'],
        'application/x-cpio-compressed' => ['cpio.gz'],
        'application/x-csh' => ['csh'],
        'application/x-cue' => ['cue'],
        'application/x-dar' => ['dar'],
        'application/x-dbase' => ['dbf'],
        'application/x-dbf' => ['dbf'],
        'application/x-dc-rom' => ['dc'],
        'application/x-deb' => ['deb', 'udeb'],
        'application/x-debian-package' => ['deb', 'udeb'],
        'application/x-designer' => ['ui'],
        'application/x-desktop' => ['desktop', 'kdelnk'],
        'application/x-dgc-compressed' => ['dgc'],
        'application/x-dia-diagram' => ['dia'],
        'application/x-dia-shape' => ['shape'],
        'application/x-director' => ['dir', 'dcr', 'dxr', 'cst', 'cct', 'cxt', 'w3d', 'fgd', 'swa'],
        'application/x-docbook+xml' => ['dbk', 'docbook'],
        'application/x-doom' => ['wad'],
        'application/x-doom-wad' => ['wad'],
        'application/x-dtbncx+xml' => ['ncx'],
        'application/x-dtbook+xml' => ['dtb'],
        'application/x-dtbresource+xml' => ['res'],
        'application/x-dvi' => ['dvi'],
        'application/x-e-theme' => ['etheme'],
        'application/x-egon' => ['egon'],
        'application/x-emf' => ['emf'],
        'application/x-envoy' => ['evy'],
        'application/x-eva' => ['eva'],
        'application/x-fd-file' => ['fd', 'qd'],
        'application/x-fds-disk' => ['fds'],
        'application/x-fictionbook' => ['fb2'],
        'application/x-fictionbook+xml' => ['fb2'],
        'application/x-flash-video' => ['flv'],
        'application/x-fluid' => ['fl'],
        'application/x-font-afm' => ['afm'],
        'application/x-font-bdf' => ['bdf'],
        'application/x-font-ghostscript' => ['gsf'],
        'application/x-font-linux-psf' => ['psf'],
        'application/x-font-otf' => ['otf'],
        'application/x-font-pcf' => ['pcf', 'pcf.Z', 'pcf.gz'],
        'application/x-font-snf' => ['snf'],
        'application/x-font-speedo' => ['spd'],
        'application/x-font-ttf' => ['ttf'],
        'application/x-font-ttx' => ['ttx'],
        'application/x-font-type1' => ['pfa', 'pfb', 'pfm', 'afm', 'gsf'],
        'application/x-font-woff' => ['woff'],
        'application/x-frame' => ['fm'],
        'application/x-freearc' => ['arc'],
        'application/x-futuresplash' => ['spl'],
        'application/x-gameboy-color-rom' => ['gbc', 'cgb'],
        'application/x-gameboy-rom' => ['gb', 'sgb'],
        'application/x-gamecube-iso-image' => ['iso'],
        'application/x-gamecube-rom' => ['iso'],
        'application/x-gamegear-rom' => ['gg'],
        'application/x-gba-rom' => ['gba', 'agb'],
        'application/x-gca-compressed' => ['gca'],
        'application/x-gedcom' => ['ged', 'gedcom'],
        'application/x-genesis-32x-rom' => ['32x', 'mdx'],
        'application/x-genesis-rom' => ['gen', 'smd'],
        'application/x-gettext' => ['po'],
        'application/x-gettext-translation' => ['gmo', 'mo'],
        'application/x-glade' => ['glade'],
        'application/x-glulx' => ['ulx'],
        'application/x-gnome-app-info' => ['desktop', 'kdelnk'],
        'application/x-gnucash' => ['gnucash', 'gnc', 'xac'],
        'application/x-gnumeric' => ['gnumeric'],
        'application/x-gnuplot' => ['gp', 'gplt', 'gnuplot'],
        'application/x-go-sgf' => ['sgf'],
        'application/x-gpx' => ['gpx'],
        'application/x-gpx+xml' => ['gpx'],
        'application/x-gramps-xml' => ['gramps'],
        'application/x-graphite' => ['gra'],
        'application/x-gtar' => ['gtar', 'tar', 'gem'],
        'application/x-gtk-builder' => ['ui'],
        'application/x-gz-font-linux-psf' => ['psf.gz'],
        'application/x-gzdvi' => ['dvi.gz'],
        'application/x-gzip' => ['gz'],
        'application/x-gzpdf' => ['pdf.gz'],
        'application/x-gzpostscript' => ['ps.gz'],
        'application/x-hdf' => ['hdf', 'hdf4', 'h4', 'hdf5', 'h5'],
        'application/x-hfe-file' => ['hfe'],
        'application/x-hfe-floppy-image' => ['hfe'],
        'application/x-hwp' => ['hwp'],
        'application/x-hwt' => ['hwt'],
        'application/x-ica' => ['ica'],
        'application/x-install-instructions' => ['install'],
        'application/x-ipynb+json' => ['ipynb'],
        'application/x-iso9660-appimage' => ['appimage'],
        'application/x-iso9660-image' => ['iso', 'iso9660'],
        'application/x-it87' => ['it87'],
        'application/x-iwork-keynote-sffkey' => ['key'],
        'application/x-jar' => ['jar'],
        'application/x-java' => ['class'],
        'application/x-java-archive' => ['jar'],
        'application/x-java-class' => ['class'],
        'application/x-java-jce-keystore' => ['jceks'],
        'application/x-java-jnlp-file' => ['jnlp'],
        'application/x-java-keystore' => ['jks', 'ks'],
        'application/x-java-pack200' => ['pack'],
        'application/x-java-vm' => ['class'],
        'application/x-javascript' => ['js', 'jsm', 'mjs'],
        'application/x-jbuilder-project' => ['jpr', 'jpx'],
        'application/x-karbon' => ['karbon'],
        'application/x-kchart' => ['chrt'],
        'application/x-kexi-connectiondata' => ['kexic'],
        'application/x-kexiproject-shortcut' => ['kexis'],
        'application/x-kexiproject-sqlite' => ['kexi'],
        'application/x-kexiproject-sqlite2' => ['kexi'],
        'application/x-kexiproject-sqlite3' => ['kexi'],
        'application/x-kformula' => ['kfo'],
        'application/x-killustrator' => ['kil'],
        'application/x-kivio' => ['flw'],
        'application/x-kontour' => ['kon'],
        'application/x-kpovmodeler' => ['kpm'],
        'application/x-kpresenter' => ['kpr', 'kpt'],
        'application/x-krita' => ['kra'],
        'application/x-kspread' => ['ksp'],
        'application/x-kugar' => ['kud'],
        'application/x-kword' => ['kwd', 'kwt'],
        'application/x-latex' => ['latex'],
        'application/x-lha' => ['lha', 'lzh'],
        'application/x-lhz' => ['lhz'],
        'application/x-linguist' => ['ts'],
        'application/x-lotus123' => ['123', 'wk1', 'wk3', 'wk4', 'wks'],
        'application/x-lrzip' => ['lrz'],
        'application/x-lrzip-compressed-tar' => ['tar.lrz', 'tlrz'],
        'application/x-lyx' => ['lyx'],
        'application/x-lz4' => ['lz4'],
        'application/x-lz4-compressed-tar' => ['tar.lz4'],
        'application/x-lzh-compressed' => ['lzh', 'lha'],
        'application/x-lzip' => ['lz'],
        'application/x-lzip-compressed-tar' => ['tar.lz'],
        'application/x-lzma' => ['lzma'],
        'application/x-lzma-compressed-tar' => ['tar.lzma', 'tlz'],
        'application/x-lzop' => ['lzo'],
        'application/x-lzpdf' => ['pdf.lz'],
        'application/x-m4' => ['m4'],
        'application/x-magicpoint' => ['mgp'],
        'application/x-markaby' => ['mab'],
        'application/x-mathematica' => ['nb'],
        'application/x-mdb' => ['mdb'],
        'application/x-mie' => ['mie'],
        'application/x-mif' => ['mif'],
        'application/x-mimearchive' => ['mhtml', 'mht'],
        'application/x-mobipocket-ebook' => ['prc', 'mobi'],
        'application/x-ms-application' => ['application'],
        'application/x-ms-asx' => ['asx', 'wax', 'wvx', 'wmx'],
        'application/x-ms-dos-executable' => ['exe'],
        'application/x-ms-shortcut' => ['lnk'],
        'application/x-ms-wim' => ['wim', 'swm'],
        'application/x-ms-wmd' => ['wmd'],
        'application/x-ms-wmz' => ['wmz'],
        'application/x-ms-xbap' => ['xbap'],
        'application/x-msaccess' => ['mdb'],
        'application/x-msbinder' => ['obd'],
        'application/x-mscardfile' => ['crd'],
        'application/x-msclip' => ['clp'],
        'application/x-msdownload' => ['exe', 'dll', 'com', 'bat', 'msi'],
        'application/x-msexcel' => ['xls', 'xlc', 'xll', 'xlm', 'xlw', 'xla', 'xlt', 'xld'],
        'application/x-msi' => ['msi'],
        'application/x-msmediaview' => ['mvb', 'm13', 'm14'],
        'application/x-msmetafile' => ['wmf', 'wmz', 'emf', 'emz'],
        'application/x-msmoney' => ['mny'],
        'application/x-mspowerpoint' => ['ppz', 'ppt', 'pps', 'pot'],
        'application/x-mspublisher' => ['pub'],
        'application/x-msschedule' => ['scd'],
        'application/x-msterminal' => ['trm'],
        'application/x-mswinurl' => ['url'],
        'application/x-msword' => ['doc'],
        'application/x-mswrite' => ['wri'],
        'application/x-msx-rom' => ['msx'],
        'application/x-n64-rom' => ['n64', 'z64', 'v64'],
        'application/x-navi-animation' => ['ani'],
        'application/x-neo-geo-pocket-color-rom' => ['ngc'],
        'application/x-neo-geo-pocket-rom' => ['ngp'],
        'application/x-nes-rom' => ['nes', 'nez', 'unf', 'unif'],
        'application/x-netcdf' => ['nc', 'cdf'],
        'application/x-netshow-channel' => ['nsc'],
        'application/x-nintendo-ds-rom' => ['nds'],
        'application/x-nzb' => ['nzb'],
        'application/x-object' => ['o'],
        'application/x-ogg' => ['ogx'],
        'application/x-oleo' => ['oleo'],
        'application/x-pagemaker' => ['p65', 'pm', 'pm6', 'pmd'],
        'application/x-pak' => ['pak'],
        'application/x-palm-database' => ['prc', 'pdb', 'pqa', 'oprc'],
        'application/x-par2' => ['PAR2', 'par2'],
        'application/x-partial-download' => ['wkdownload', 'crdownload', 'part'],
        'application/x-pc-engine-rom' => ['pce'],
        'application/x-pcap' => ['pcap', 'cap', 'dmp'],
        'application/x-pdf' => ['pdf'],
        'application/x-perl' => ['pl', 'PL', 'pm', 'al', 'perl', 'pod', 't'],
        'application/x-photoshop' => ['psd'],
        'application/x-php' => ['php', 'php3', 'php4', 'php5', 'phps'],
        'application/x-pkcs12' => ['p12', 'pfx'],
        'application/x-pkcs7-certificates' => ['p7b', 'spc'],
        'application/x-pkcs7-certreqresp' => ['p7r'],
        'application/x-planperfect' => ['pln'],
        'application/x-pocket-word' => ['psw'],
        'application/x-pw' => ['pw'],
        'application/x-python-bytecode' => ['pyc', 'pyo'],
        'application/x-qpress' => ['qp'],
        'application/x-qtiplot' => ['qti', 'qti.gz'],
        'application/x-quattropro' => ['wb1', 'wb2', 'wb3'],
        'application/x-quicktime-media-link' => ['qtl'],
        'application/x-quicktimeplayer' => ['qtl'],
        'application/x-qw' => ['qif'],
        'application/x-rar' => ['rar'],
        'application/x-rar-compressed' => ['rar'],
        'application/x-raw-disk-image' => ['raw-disk-image', 'img'],
        'application/x-raw-disk-image-xz-compressed' => ['raw-disk-image.xz', 'img.xz'],
        'application/x-raw-floppy-disk-image' => ['fd', 'qd'],
        'application/x-redhat-package-manager' => ['rpm'],
        'application/x-reject' => ['rej'],
        'application/x-research-info-systems' => ['ris'],
        'application/x-rnc' => ['rnc'],
        'application/x-rpm' => ['rpm'],
        'application/x-ruby' => ['rb'],
        'application/x-sami' => ['smi', 'sami'],
        'application/x-sap-file' => ['sap'],
        'application/x-saturn-rom' => ['bin', 'iso'],
        'application/x-sdp' => ['sdp'],
        'application/x-sega-cd-rom' => ['bin', 'iso'],
        'application/x-sg1000-rom' => ['sg'],
        'application/x-sh' => ['sh'],
        'application/x-shar' => ['shar'],
        'application/x-shared-library-la' => ['la'],
        'application/x-sharedlib' => ['so'],
        'application/x-shellscript' => ['sh'],
        'application/x-shockwave-flash' => ['swf', 'spl'],
        'application/x-shorten' => ['shn'],
        'application/x-siag' => ['siag'],
        'application/x-silverlight-app' => ['xap'],
        'application/x-sit' => ['sit'],
        'application/x-smaf' => ['mmf', 'smaf'],
        'application/x-sms-rom' => ['sms'],
        'application/x-snes-rom' => ['sfc', 'smc'],
        'application/x-source-rpm' => ['src.rpm', 'spm'],
        'application/x-spss-por' => ['por'],
        'application/x-spss-sav' => ['sav', 'zsav'],
        'application/x-spss-savefile' => ['sav', 'zsav'],
        'application/x-sql' => ['sql'],
        'application/x-sqlite2' => ['sqlite2'],
        'application/x-sqlite3' => ['sqlite3'],
        'application/x-srt' => ['srt'],
        'application/x-stuffit' => ['sit'],
        'application/x-stuffitx' => ['sitx'],
        'application/x-subrip' => ['srt'],
        'application/x-sv4cpio' => ['sv4cpio'],
        'application/x-sv4crc' => ['sv4crc'],
        'application/x-t3vm-image' => ['t3'],
        'application/x-t602' => ['602'],
        'application/x-tads' => ['gam'],
        'application/x-tar' => ['tar', 'gtar', 'gem'],
        'application/x-tarz' => ['tar.Z', 'taz'],
        'application/x-tcl' => ['tcl'],
        'application/x-tex' => ['tex', 'ltx', 'sty', 'cls', 'dtx', 'ins', 'latex'],
        'application/x-tex-gf' => ['gf'],
        'application/x-tex-pk' => ['pk'],
        'application/x-tex-tfm' => ['tfm'],
        'application/x-texinfo' => ['texinfo', 'texi'],
        'application/x-tgif' => ['obj'],
        'application/x-theme' => ['theme'],
        'application/x-thomson-cartridge-memo7' => ['m7'],
        'application/x-thomson-cassette' => ['k7'],
        'application/x-thomson-sap-image' => ['sap'],
        'application/x-trash' => ['bak', 'old', 'sik'],
        'application/x-trig' => ['trig'],
        'application/x-troff' => ['tr', 'roff', 't'],
        'application/x-troff-man' => ['man'],
        'application/x-tzo' => ['tar.lzo', 'tzo'],
        'application/x-ufraw' => ['ufraw'],
        'application/x-ustar' => ['ustar'],
        'application/x-virtual-boy-rom' => ['vb'],
        'application/x-vnd.kde.kexi' => ['kexi'],
        'application/x-wais-source' => ['src'],
        'application/x-wbfs' => ['iso'],
        'application/x-wia' => ['iso'],
        'application/x-wii-iso-image' => ['iso'],
        'application/x-wii-rom' => ['iso'],
        'application/x-wii-wad' => ['wad'],
        'application/x-windows-themepack' => ['themepack'],
        'application/x-wmf' => ['wmf'],
        'application/x-wonderswan-color-rom' => ['wsc'],
        'application/x-wonderswan-rom' => ['ws'],
        'application/x-wordperfect' => ['wp', 'wp4', 'wp5', 'wp6', 'wpd', 'wpp'],
        'application/x-wpg' => ['wpg'],
        'application/x-wwf' => ['wwf'],
        'application/x-x509-ca-cert' => ['der', 'crt', 'cert', 'pem'],
        'application/x-xar' => ['xar', 'pkg'],
        'application/x-xbel' => ['xbel'],
        'application/x-xfig' => ['fig'],
        'application/x-xliff' => ['xlf', 'xliff'],
        'application/x-xliff+xml' => ['xlf'],
        'application/x-xpinstall' => ['xpi'],
        'application/x-xspf+xml' => ['xspf'],
        'application/x-xz' => ['xz'],
        'application/x-xz-compressed-tar' => ['tar.xz', 'txz'],
        'application/x-xzpdf' => ['pdf.xz'],
        'application/x-yaml' => ['yaml', 'yml'],
        'application/x-zip' => ['zip'],
        'application/x-zip-compressed' => ['zip'],
        'application/x-zip-compressed-fb2' => ['fb2.zip'],
        'application/x-zmachine' => ['z1', 'z2', 'z3', 'z4', 'z5', 'z6', 'z7', 'z8'],
        'application/x-zoo' => ['zoo'],
        'application/xaml+xml' => ['xaml'],
        'application/xcap-diff+xml' => ['xdf'],
        'application/xenc+xml' => ['xenc'],
        'application/xhtml+xml' => ['xhtml', 'xht'],
        'application/xliff+xml' => ['xlf', 'xliff'],
        'application/xml' => ['xml', 'xsl', 'xbl', 'xsd', 'rng'],
        'application/xml-dtd' => ['dtd'],
        'application/xml-external-parsed-entity' => ['ent'],
        'application/xop+xml' => ['xop'],
        'application/xproc+xml' => ['xpl'],
        'application/xps' => ['oxps', 'xps'],
        'application/xslt+xml' => ['xslt', 'xsl'],
        'application/xspf+xml' => ['xspf'],
        'application/xv+xml' => ['mxml', 'xhvml', 'xvml', 'xvm'],
        'application/yang' => ['yang'],
        'application/yin+xml' => ['yin'],
        'application/zip' => ['zip'],
        'application/zlib' => ['zz'],
        'audio/3gpp' => ['3gp', '3gpp', '3ga'],
        'audio/3gpp-encrypted' => ['3gp', '3gpp', '3ga'],
        'audio/3gpp2' => ['3g2', '3gp2', '3gpp2'],
        'audio/aac' => ['aac', 'adts', 'ass'],
        'audio/ac3' => ['ac3'],
        'audio/adpcm' => ['adp'],
        'audio/amr' => ['amr'],
        'audio/amr-encrypted' => ['amr'],
        'audio/amr-wb' => ['awb'],
        'audio/amr-wb-encrypted' => ['awb'],
        'audio/annodex' => ['axa'],
        'audio/basic' => ['au', 'snd'],
        'audio/flac' => ['flac'],
        'audio/imelody' => ['imy', 'ime'],
        'audio/m3u' => ['m3u', 'm3u8', 'vlc'],
        'audio/m4a' => ['m4a', 'f4a'],
        'audio/midi' => ['mid', 'midi', 'kar', 'rmi'],
        'audio/mobile-xmf' => ['xmf'],
        'audio/mp2' => ['mp2'],
        'audio/mp3' => ['mp3', 'mpga'],
        'audio/mp4' => ['m4a', 'mp4a', 'f4a'],
        'audio/mpeg' => ['mpga', 'mp2', 'mp2a', 'mp3', 'm2a', 'm3a'],
        'audio/mpegurl' => ['m3u', 'm3u8', 'vlc'],
        'audio/ogg' => ['oga', 'ogg', 'spx', 'opus'],
        'audio/prs.sid' => ['sid', 'psid'],
        'audio/s3m' => ['s3m'],
        'audio/scpls' => ['pls'],
        'audio/silk' => ['sil'],
        'audio/tta' => ['tta'],
        'audio/usac' => ['loas', 'xhe'],
        'audio/vnd.audible' => ['aa', 'aax'],
        'audio/vnd.audible.aax' => ['aa', 'aax'],
        'audio/vnd.dece.audio' => ['uva', 'uvva'],
        'audio/vnd.digital-winds' => ['eol'],
        'audio/vnd.dra' => ['dra'],
        'audio/vnd.dts' => ['dts'],
        'audio/vnd.dts.hd' => ['dtshd'],
        'audio/vnd.lucent.voice' => ['lvp'],
        'audio/vnd.m-realaudio' => ['ra', 'rax'],
        'audio/vnd.ms-playready.media.pya' => ['pya'],
        'audio/vnd.nuera.ecelp4800' => ['ecelp4800'],
        'audio/vnd.nuera.ecelp7470' => ['ecelp7470'],
        'audio/vnd.nuera.ecelp9600' => ['ecelp9600'],
        'audio/vnd.rip' => ['rip'],
        'audio/vnd.rn-realaudio' => ['ra', 'rax'],
        'audio/vnd.wave' => ['wav'],
        'audio/vorbis' => ['oga', 'ogg'],
        'audio/wav' => ['wav'],
        'audio/webm' => ['weba'],
        'audio/wma' => ['wma'],
        'audio/x-aac' => ['aac', 'adts', 'ass'],
        'audio/x-aifc' => ['aifc', 'aiffc'],
        'audio/x-aiff' => ['aif', 'aiff', 'aifc'],
        'audio/x-aiffc' => ['aifc', 'aiffc'],
        'audio/x-amzxml' => ['amz'],
        'audio/x-annodex' => ['axa'],
        'audio/x-ape' => ['ape'],
        'audio/x-caf' => ['caf'],
        'audio/x-dts' => ['dts'],
        'audio/x-dtshd' => ['dtshd'],
        'audio/x-flac' => ['flac'],
        'audio/x-flac+ogg' => ['oga', 'ogg'],
        'audio/x-gsm' => ['gsm'],
        'audio/x-hx-aac-adts' => ['aac', 'adts', 'ass'],
        'audio/x-imelody' => ['imy', 'ime'],
        'audio/x-iriver-pla' => ['pla'],
        'audio/x-it' => ['it'],
        'audio/x-m3u' => ['m3u', 'm3u8', 'vlc'],
        'audio/x-m4a' => ['m4a', 'f4a'],
        'audio/x-m4b' => ['m4b', 'f4b'],
        'audio/x-m4r' => ['m4r'],
        'audio/x-matroska' => ['mka'],
        'audio/x-midi' => ['mid', 'midi', 'kar'],
        'audio/x-minipsf' => ['minipsf'],
        'audio/x-mo3' => ['mo3'],
        'audio/x-mod' => ['mod', 'ult', 'uni', 'm15', 'mtm', '669', 'med'],
        'audio/x-mp2' => ['mp2'],
        'audio/x-mp3' => ['mp3', 'mpga'],
        'audio/x-mp3-playlist' => ['m3u', 'm3u8', 'vlc'],
        'audio/x-mpeg' => ['mp3', 'mpga'],
        'audio/x-mpegurl' => ['m3u', 'm3u8', 'vlc'],
        'audio/x-mpg' => ['mp3', 'mpga'],
        'audio/x-ms-asx' => ['asx', 'wax', 'wvx', 'wmx'],
        'audio/x-ms-wax' => ['wax'],
        'audio/x-ms-wma' => ['wma'],
        'audio/x-musepack' => ['mpc', 'mpp', 'mp+'],
        'audio/x-ogg' => ['oga', 'ogg', 'opus'],
        'audio/x-oggflac' => ['oga', 'ogg'],
        'audio/x-opus+ogg' => ['opus'],
        'audio/x-pn-audibleaudio' => ['aa', 'aax'],
        'audio/x-pn-realaudio' => ['ram', 'ra', 'rax'],
        'audio/x-pn-realaudio-plugin' => ['rmp'],
        'audio/x-psf' => ['psf'],
        'audio/x-psflib' => ['psflib'],
        'audio/x-rn-3gpp-amr' => ['3gp', '3gpp', '3ga'],
        'audio/x-rn-3gpp-amr-encrypted' => ['3gp', '3gpp', '3ga'],
        'audio/x-rn-3gpp-amr-wb' => ['3gp', '3gpp', '3ga'],
        'audio/x-rn-3gpp-amr-wb-encrypted' => ['3gp', '3gpp', '3ga'],
        'audio/x-s3m' => ['s3m'],
        'audio/x-scpls' => ['pls'],
        'audio/x-shorten' => ['shn'],
        'audio/x-speex' => ['spx'],
        'audio/x-speex+ogg' => ['oga', 'ogg'],
        'audio/x-stm' => ['stm'],
        'audio/x-tta' => ['tta'],
        'audio/x-voc' => ['voc'],
        'audio/x-vorbis' => ['oga', 'ogg'],
        'audio/x-vorbis+ogg' => ['oga', 'ogg'],
        'audio/x-wav' => ['wav'],
        'audio/x-wavpack' => ['wv', 'wvp'],
        'audio/x-wavpack-correction' => ['wvc'],
        'audio/x-xi' => ['xi'],
        'audio/x-xm' => ['xm'],
        'audio/x-xmf' => ['xmf'],
        'audio/xm' => ['xm'],
        'audio/xmf' => ['xmf'],
        'chemical/x-cdx' => ['cdx'],
        'chemical/x-cif' => ['cif'],
        'chemical/x-cmdf' => ['cmdf'],
        'chemical/x-cml' => ['cml'],
        'chemical/x-csml' => ['csml'],
        'chemical/x-xyz' => ['xyz'],
        'flv-application/octet-stream' => ['flv'],
        'font/collection' => ['ttc'],
        'font/otf' => ['otf'],
        'font/ttf' => ['ttf'],
        'font/woff' => ['woff', 'woff2'],
        'font/woff2' => ['woff2'],
        'image/bmp' => ['bmp', 'dib'],
        'image/cdr' => ['cdr'],
        'image/cgm' => ['cgm'],
        'image/emf' => ['emf'],
        'image/fax-g3' => ['g3'],
        'image/fits' => ['fits'],
        'image/g3fax' => ['g3'],
        'image/gif' => ['gif'],
        'image/heic' => ['heic', 'heif'],
        'image/heic-sequence' => ['heic', 'heif'],
        'image/heif' => ['heic', 'heif'],
        'image/heif-sequence' => ['heic', 'heif'],
        'image/ico' => ['ico'],
        'image/icon' => ['ico'],
        'image/ief' => ['ief'],
        'image/jp2' => ['jp2', 'jpg2'],
        'image/jpeg' => ['jpeg', 'jpg', 'jpe'],
        'image/jpeg2000' => ['jp2', 'jpg2'],
        'image/jpeg2000-image' => ['jp2', 'jpg2'],
        'image/jpm' => ['jpm', 'jpgm'],
        'image/jpx' => ['jpf', 'jpx'],
        'image/ktx' => ['ktx'],
        'image/openraster' => ['ora'],
        'image/pdf' => ['pdf'],
        'image/photoshop' => ['psd'],
        'image/pjpeg' => ['jpeg', 'jpg', 'jpe'],
        'image/png' => ['png'],
        'image/prs.btif' => ['btif'],
        'image/psd' => ['psd'],
        'image/rle' => ['rle'],
        'image/sgi' => ['sgi'],
        'image/svg' => ['svg'],
        'image/svg+xml' => ['svg', 'svgz'],
        'image/svg+xml-compressed' => ['svgz'],
        'image/tiff' => ['tiff', 'tif'],
        'image/vnd.adobe.photoshop' => ['psd'],
        'image/vnd.dece.graphic' => ['uvi', 'uvvi', 'uvg', 'uvvg'],
        'image/vnd.djvu' => ['djvu', 'djv'],
        'image/vnd.djvu+multipage' => ['djvu', 'djv'],
        'image/vnd.dvb.subtitle' => ['sub'],
        'image/vnd.dwg' => ['dwg'],
        'image/vnd.dxf' => ['dxf'],
        'image/vnd.fastbidsheet' => ['fbs'],
        'image/vnd.fpx' => ['fpx'],
        'image/vnd.fst' => ['fst'],
        'image/vnd.fujixerox.edmics-mmr' => ['mmr'],
        'image/vnd.fujixerox.edmics-rlc' => ['rlc'],
        'image/vnd.microsoft.icon' => ['ico'],
        'image/vnd.ms-modi' => ['mdi'],
        'image/vnd.ms-photo' => ['wdp'],
        'image/vnd.net-fpx' => ['npx'],
        'image/vnd.rn-realpix' => ['rp'],
        'image/vnd.wap.wbmp' => ['wbmp'],
        'image/vnd.xiff' => ['xif'],
        'image/vnd.zbrush.pcx' => ['pcx'],
        'image/webp' => ['webp'],
        'image/wmf' => ['wmf'],
        'image/x-3ds' => ['3ds'],
        'image/x-adobe-dng' => ['dng'],
        'image/x-applix-graphics' => ['ag'],
        'image/x-bmp' => ['bmp', 'dib'],
        'image/x-bzeps' => ['eps.bz2', 'epsi.bz2', 'epsf.bz2'],
        'image/x-canon-cr2' => ['cr2'],
        'image/x-canon-crw' => ['crw'],
        'image/x-cdr' => ['cdr'],
        'image/x-cmu-raster' => ['ras'],
        'image/x-cmx' => ['cmx'],
        'image/x-compressed-xcf' => ['xcf.gz', 'xcf.bz2'],
        'image/x-dds' => ['dds'],
        'image/x-djvu' => ['djvu', 'djv'],
        'image/x-emf' => ['emf'],
        'image/x-eps' => ['eps', 'epsi', 'epsf'],
        'image/x-exr' => ['exr'],
        'image/x-fits' => ['fits'],
        'image/x-freehand' => ['fh', 'fhc', 'fh4', 'fh5', 'fh7'],
        'image/x-fuji-raf' => ['raf'],
        'image/x-gimp-gbr' => ['gbr'],
        'image/x-gimp-gih' => ['gih'],
        'image/x-gimp-pat' => ['pat'],
        'image/x-gzeps' => ['eps.gz', 'epsi.gz', 'epsf.gz'],
        'image/x-icb' => ['tga', 'icb', 'tpic', 'vda', 'vst'],
        'image/x-icns' => ['icns'],
        'image/x-ico' => ['ico'],
        'image/x-icon' => ['ico'],
        'image/x-iff' => ['iff', 'ilbm', 'lbm'],
        'image/x-ilbm' => ['iff', 'ilbm', 'lbm'],
        'image/x-jng' => ['jng'],
        'image/x-jp2-codestream' => ['j2c', 'j2k', 'jpc'],
        'image/x-jpeg2000-image' => ['jp2', 'jpg2'],
        'image/x-kodak-dcr' => ['dcr'],
        'image/x-kodak-k25' => ['k25'],
        'image/x-kodak-kdc' => ['kdc'],
        'image/x-lwo' => ['lwo', 'lwob'],
        'image/x-lws' => ['lws'],
        'image/x-macpaint' => ['pntg'],
        'image/x-minolta-mrw' => ['mrw'],
        'image/x-mrsid-image' => ['sid'],
        'image/x-ms-bmp' => ['bmp', 'dib'],
        'image/x-msod' => ['msod'],
        'image/x-nikon-nef' => ['nef'],
        'image/x-olympus-orf' => ['orf'],
        'image/x-panasonic-raw' => ['raw'],
        'image/x-panasonic-raw2' => ['rw2'],
        'image/x-panasonic-rw' => ['raw'],
        'image/x-panasonic-rw2' => ['rw2'],
        'image/x-pcx' => ['pcx'],
        'image/x-pentax-pef' => ['pef'],
        'image/x-photo-cd' => ['pcd'],
        'image/x-photoshop' => ['psd'],
        'image/x-pict' => ['pic', 'pct', 'pict', 'pict1', 'pict2'],
        'image/x-portable-anymap' => ['pnm'],
        'image/x-portable-bitmap' => ['pbm'],
        'image/x-portable-graymap' => ['pgm'],
        'image/x-portable-pixmap' => ['ppm'],
        'image/x-psd' => ['psd'],
        'image/x-quicktime' => ['qtif', 'qif'],
        'image/x-rgb' => ['rgb'],
        'image/x-sgi' => ['sgi'],
        'image/x-sigma-x3f' => ['x3f'],
        'image/x-skencil' => ['sk', 'sk1'],
        'image/x-sony-arw' => ['arw'],
        'image/x-sony-sr2' => ['sr2'],
        'image/x-sony-srf' => ['srf'],
        'image/x-sun-raster' => ['sun'],
        'image/x-tga' => ['tga', 'icb', 'tpic', 'vda', 'vst'],
        'image/x-win-bitmap' => ['cur'],
        'image/x-win-metafile' => ['wmf'],
        'image/x-wmf' => ['wmf'],
        'image/x-xbitmap' => ['xbm'],
        'image/x-xcf' => ['xcf'],
        'image/x-xfig' => ['fig'],
        'image/x-xpixmap' => ['xpm'],
        'image/x-xpm' => ['xpm'],
        'image/x-xwindowdump' => ['xwd'],
        'image/x.djvu' => ['djvu', 'djv'],
        'message/rfc822' => ['eml', 'mime'],
        'model/iges' => ['igs', 'iges'],
        'model/mesh' => ['msh', 'mesh', 'silo'],
        'model/stl' => ['stl'],
        'model/vnd.collada+xml' => ['dae'],
        'model/vnd.dwf' => ['dwf'],
        'model/vnd.gdl' => ['gdl'],
        'model/vnd.gtw' => ['gtw'],
        'model/vnd.mts' => ['mts'],
        'model/vnd.vtu' => ['vtu'],
        'model/vrml' => ['wrl', 'vrml', 'vrm'],
        'model/x.stl-ascii' => ['stl'],
        'model/x.stl-binary' => ['stl'],
        'model/x3d+binary' => ['x3db', 'x3dbz'],
        'model/x3d+vrml' => ['x3dv', 'x3dvz'],
        'model/x3d+xml' => ['x3d', 'x3dz'],
        'text/cache-manifest' => ['appcache', 'manifest'],
        'text/calendar' => ['ics', 'ifb', 'vcs'],
        'text/css' => ['css'],
        'text/csv' => ['csv'],
        'text/csv-schema' => ['csvs'],
        'text/directory' => ['vcard', 'vcf', 'vct', 'gcrd'],
        'text/ecmascript' => ['es'],
        'text/gedcom' => ['ged', 'gedcom'],
        'text/google-video-pointer' => ['gvp'],
        'text/html' => ['html', 'htm'],
        'text/ico' => ['ico'],
        'text/javascript' => ['js', 'jsm', 'mjs'],
        'text/markdown' => ['md', 'mkd', 'markdown'],
        'text/mathml' => ['mml'],
        'text/n3' => ['n3'],
        'text/plain' => ['txt', 'text', 'conf', 'def', 'list', 'log', 'in', 'asc'],
        'text/prs.lines.tag' => ['dsc'],
        'text/rdf' => ['rdf', 'rdfs', 'owl'],
        'text/richtext' => ['rtx'],
        'text/rss' => ['rss'],
        'text/rtf' => ['rtf'],
        'text/rust' => ['rs'],
        'text/sgml' => ['sgml', 'sgm'],
        'text/spreadsheet' => ['sylk', 'slk'],
        'text/tab-separated-values' => ['tsv'],
        'text/troff' => ['t', 'tr', 'roff', 'man', 'me', 'ms'],
        'text/turtle' => ['ttl'],
        'text/uri-list' => ['uri', 'uris', 'urls'],
        'text/vcard' => ['vcard', 'vcf', 'vct', 'gcrd'],
        'text/vnd.curl' => ['curl'],
        'text/vnd.curl.dcurl' => ['dcurl'],
        'text/vnd.curl.mcurl' => ['mcurl'],
        'text/vnd.curl.scurl' => ['scurl'],
        'text/vnd.dvb.subtitle' => ['sub'],
        'text/vnd.fly' => ['fly'],
        'text/vnd.fmi.flexstor' => ['flx'],
        'text/vnd.graphviz' => ['gv', 'dot'],
        'text/vnd.in3d.3dml' => ['3dml'],
        'text/vnd.in3d.spot' => ['spot'],
        'text/vnd.qt.linguist' => ['ts'],
        'text/vnd.rn-realtext' => ['rt'],
        'text/vnd.sun.j2me.app-descriptor' => ['jad'],
        'text/vnd.trolltech.linguist' => ['ts'],
        'text/vnd.wap.wml' => ['wml'],
        'text/vnd.wap.wmlscript' => ['wmls'],
        'text/vtt' => ['vtt'],
        'text/x-adasrc' => ['adb', 'ads'],
        'text/x-asm' => ['s', 'asm'],
        'text/x-bibtex' => ['bib'],
        'text/x-c' => ['c', 'cc', 'cxx', 'cpp', 'h', 'hh', 'dic'],
        'text/x-c++hdr' => ['hh', 'hp', 'hpp', 'h++', 'hxx'],
        'text/x-c++src' => ['cpp', 'cxx', 'cc', 'C', 'c++'],
        'text/x-chdr' => ['h'],
        'text/x-cmake' => ['cmake'],
        'text/x-cobol' => ['cbl', 'cob'],
        'text/x-comma-separated-values' => ['csv'],
        'text/x-csharp' => ['cs'],
        'text/x-csrc' => ['c'],
        'text/x-csv' => ['csv'],
        'text/x-dbus-service' => ['service'],
        'text/x-dcl' => ['dcl'],
        'text/x-diff' => ['diff', 'patch'],
        'text/x-dsl' => ['dsl'],
        'text/x-dsrc' => ['d', 'di'],
        'text/x-dtd' => ['dtd'],
        'text/x-eiffel' => ['e', 'eif'],
        'text/x-emacs-lisp' => ['el'],
        'text/x-erlang' => ['erl'],
        'text/x-fortran' => ['f', 'for', 'f77', 'f90', 'f95'],
        'text/x-genie' => ['gs'],
        'text/x-gettext-translation' => ['po'],
        'text/x-gettext-translation-template' => ['pot'],
        'text/x-gherkin' => ['feature'],
        'text/x-go' => ['go'],
        'text/x-google-video-pointer' => ['gvp'],
        'text/x-haskell' => ['hs'],
        'text/x-idl' => ['idl'],
        'text/x-imelody' => ['imy', 'ime'],
        'text/x-iptables' => ['iptables'],
        'text/x-java' => ['java'],
        'text/x-java-source' => ['java'],
        'text/x-ldif' => ['ldif'],
        'text/x-lilypond' => ['ly'],
        'text/x-literate-haskell' => ['lhs'],
        'text/x-log' => ['log'],
        'text/x-lua' => ['lua'],
        'text/x-lyx' => ['lyx'],
        'text/x-makefile' => ['mk', 'mak'],
        'text/x-markdown' => ['md', 'mkd', 'markdown'],
        'text/x-matlab' => ['m'],
        'text/x-microdvd' => ['sub'],
        'text/x-moc' => ['moc'],
        'text/x-modelica' => ['mo'],
        'text/x-mof' => ['mof'],
        'text/x-mpsub' => ['sub'],
        'text/x-mrml' => ['mrml', 'mrl'],
        'text/x-ms-regedit' => ['reg'],
        'text/x-mup' => ['mup', 'not'],
        'text/x-nfo' => ['nfo'],
        'text/x-objcsrc' => ['m'],
        'text/x-ocaml' => ['ml', 'mli'],
        'text/x-ocl' => ['ocl'],
        'text/x-octave' => ['m'],
        'text/x-ooc' => ['ooc'],
        'text/x-opencl-src' => ['cl'],
        'text/x-opml' => ['opml'],
        'text/x-opml+xml' => ['opml'],
        'text/x-pascal' => ['p', 'pas'],
        'text/x-patch' => ['diff', 'patch'],
        'text/x-perl' => ['pl', 'PL', 'pm', 'al', 'perl', 'pod', 't'],
        'text/x-po' => ['po'],
        'text/x-pot' => ['pot'],
        'text/x-python' => ['py', 'pyx', 'wsgi'],
        'text/x-python3' => ['py', 'py3', 'py3x'],
        'text/x-qml' => ['qml', 'qmltypes', 'qmlproject'],
        'text/x-reject' => ['rej'],
        'text/x-rpm-spec' => ['spec'],
        'text/x-sass' => ['sass'],
        'text/x-scala' => ['scala'],
        'text/x-scheme' => ['scm', 'ss'],
        'text/x-scss' => ['scss'],
        'text/x-setext' => ['etx'],
        'text/x-sfv' => ['sfv'],
        'text/x-sh' => ['sh'],
        'text/x-sql' => ['sql'],
        'text/x-ssa' => ['ssa', 'ass'],
        'text/x-subviewer' => ['sub'],
        'text/x-svhdr' => ['svh'],
        'text/x-svsrc' => ['sv'],
        'text/x-systemd-unit' => ['automount', 'device', 'mount', 'path', 'scope', 'service', 'slice', 'socket', 'swap', 'target', 'timer'],
        'text/x-tcl' => ['tcl', 'tk'],
        'text/x-tex' => ['tex', 'ltx', 'sty', 'cls', 'dtx', 'ins', 'latex'],
        'text/x-texinfo' => ['texi', 'texinfo'],
        'text/x-troff' => ['tr', 'roff', 't'],
        'text/x-troff-me' => ['me'],
        'text/x-troff-mm' => ['mm'],
        'text/x-troff-ms' => ['ms'],
        'text/x-twig' => ['twig'],
        'text/x-txt2tags' => ['t2t'],
        'text/x-uil' => ['uil'],
        'text/x-uuencode' => ['uu', 'uue'],
        'text/x-vala' => ['vala', 'vapi'],
        'text/x-vcalendar' => ['vcs', 'ics'],
        'text/x-vcard' => ['vcf', 'vcard', 'vct', 'gcrd'],
        'text/x-verilog' => ['v'],
        'text/x-vhdl' => ['vhd', 'vhdl'],
        'text/x-xmi' => ['xmi'],
        'text/x-xslfo' => ['fo', 'xslfo'],
        'text/x-yaml' => ['yaml', 'yml'],
        'text/x.gcode' => ['gcode'],
        'text/xml' => ['xml', 'xbl', 'xsd', 'rng'],
        'text/xml-external-parsed-entity' => ['ent'],
        'text/yaml' => ['yaml', 'yml'],
        'video/3gp' => ['3gp', '3gpp', '3ga'],
        'video/3gpp' => ['3gp', '3gpp', '3ga'],
        'video/3gpp-encrypted' => ['3gp', '3gpp', '3ga'],
        'video/3gpp2' => ['3g2', '3gp2', '3gpp2'],
        'video/annodex' => ['axv'],
        'video/avi' => ['avi', 'avf', 'divx'],
        'video/divx' => ['avi', 'avf', 'divx'],
        'video/dv' => ['dv'],
        'video/fli' => ['fli', 'flc'],
        'video/flv' => ['flv'],
        'video/h261' => ['h261'],
        'video/h263' => ['h263'],
        'video/h264' => ['h264'],
        'video/jpeg' => ['jpgv'],
        'video/jpm' => ['jpm', 'jpgm'],
        'video/mj2' => ['mj2', 'mjp2'],
        'video/mp2t' => ['m2t', 'm2ts', 'ts', 'mts', 'cpi', 'clpi', 'mpl', 'mpls', 'bdm', 'bdmv'],
        'video/mp4' => ['mp4', 'mp4v', 'mpg4', 'm4v', 'f4v', 'lrv'],
        'video/mp4v-es' => ['mp4', 'm4v', 'f4v', 'lrv'],
        'video/mpeg' => ['mpeg', 'mpg', 'mpe', 'm1v', 'm2v', 'mp2', 'vob'],
        'video/mpeg-system' => ['mpeg', 'mpg', 'mp2', 'mpe', 'vob'],
        'video/msvideo' => ['avi', 'avf', 'divx'],
        'video/ogg' => ['ogv', 'ogg'],
        'video/quicktime' => ['qt', 'mov', 'moov', 'qtvr'],
        'video/vivo' => ['viv', 'vivo'],
        'video/vnd.dece.hd' => ['uvh', 'uvvh'],
        'video/vnd.dece.mobile' => ['uvm', 'uvvm'],
        'video/vnd.dece.pd' => ['uvp', 'uvvp'],
        'video/vnd.dece.sd' => ['uvs', 'uvvs'],
        'video/vnd.dece.video' => ['uvv', 'uvvv'],
        'video/vnd.divx' => ['avi', 'avf', 'divx'],
        'video/vnd.dvb.file' => ['dvb'],
        'video/vnd.fvt' => ['fvt'],
        'video/vnd.mpegurl' => ['mxu', 'm4u', 'm1u'],
        'video/vnd.ms-playready.media.pyv' => ['pyv'],
        'video/vnd.rn-realvideo' => ['rv', 'rvx'],
        'video/vnd.uvvu.mp4' => ['uvu', 'uvvu'],
        'video/vnd.vivo' => ['viv', 'vivo'],
        'video/webm' => ['webm'],
        'video/x-anim' => ['anim[1-9j]'],
        'video/x-annodex' => ['axv'],
        'video/x-avi' => ['avi', 'avf', 'divx'],
        'video/x-f4v' => ['f4v'],
        'video/x-fli' => ['fli', 'flc'],
        'video/x-flic' => ['fli', 'flc'],
        'video/x-flv' => ['flv'],
        'video/x-javafx' => ['fxm'],
        'video/x-m4v' => ['m4v', 'mp4', 'f4v', 'lrv'],
        'video/x-matroska' => ['mkv', 'mk3d', 'mks'],
        'video/x-matroska-3d' => ['mk3d'],
        'video/x-mjpeg' => ['mjpeg', 'mjpg'],
        'video/x-mng' => ['mng'],
        'video/x-mpeg' => ['mpeg', 'mpg', 'mp2', 'mpe', 'vob'],
        'video/x-mpeg-system' => ['mpeg', 'mpg', 'mp2', 'mpe', 'vob'],
        'video/x-mpeg2' => ['mpeg', 'mpg', 'mp2', 'mpe', 'vob'],
        'video/x-mpegurl' => ['m1u', 'm4u', 'mxu'],
        'video/x-ms-asf' => ['asf', 'asx'],
        'video/x-ms-asf-plugin' => ['asf'],
        'video/x-ms-vob' => ['vob'],
        'video/x-ms-wax' => ['asx', 'wax', 'wvx', 'wmx'],
        'video/x-ms-wm' => ['wm', 'asf'],
        'video/x-ms-wmv' => ['wmv'],
        'video/x-ms-wmx' => ['wmx', 'asx', 'wax', 'wvx'],
        'video/x-ms-wvx' => ['wvx', 'asx', 'wax', 'wmx'],
        'video/x-msvideo' => ['avi', 'avf', 'divx'],
        'video/x-nsv' => ['nsv'],
        'video/x-ogg' => ['ogv', 'ogg'],
        'video/x-ogm' => ['ogm'],
        'video/x-ogm+ogg' => ['ogm'],
        'video/x-real-video' => ['rv', 'rvx'],
        'video/x-sgi-movie' => ['movie'],
        'video/x-smv' => ['smv'],
        'video/x-theora' => ['ogg'],
        'video/x-theora+ogg' => ['ogg'],
        'x-conference/x-cooltalk' => ['ice'],
        'x-epoc/x-sisx-app' => ['sisx'],
        'zz-application/zz-winassoc-123' => ['123', 'wk1', 'wk3', 'wk4', 'wks'],
        'zz-application/zz-winassoc-cab' => ['cab'],
        'zz-application/zz-winassoc-cdr' => ['cdr'],
        'zz-application/zz-winassoc-doc' => ['doc'],
        'zz-application/zz-winassoc-hlp' => ['hlp'],
        'zz-application/zz-winassoc-mdb' => ['mdb'],
        'zz-application/zz-winassoc-uu' => ['uue'],
        'zz-application/zz-winassoc-xls' => ['xls', 'xlc', 'xll', 'xlm', 'xlw', 'xla', 'xlt', 'xld'],
    ];

    private static $reverseMap = [
        '32x' => ['application/x-genesis-32x-rom'],
        '3dml' => ['text/vnd.in3d.3dml'],
        '3ds' => ['image/x-3ds'],
        '3g2' => ['audio/3gpp2', 'video/3gpp2'],
        '3ga' => ['audio/3gpp', 'audio/3gpp-encrypted', 'audio/x-rn-3gpp-amr', 'audio/x-rn-3gpp-amr-encrypted', 'audio/x-rn-3gpp-amr-wb', 'audio/x-rn-3gpp-amr-wb-encrypted', 'video/3gp', 'video/3gpp', 'video/3gpp-encrypted'],
        '3gp' => ['audio/3gpp', 'audio/3gpp-encrypted', 'audio/x-rn-3gpp-amr', 'audio/x-rn-3gpp-amr-encrypted', 'audio/x-rn-3gpp-amr-wb', 'audio/x-rn-3gpp-amr-wb-encrypted', 'video/3gp', 'video/3gpp', 'video/3gpp-encrypted'],
        '3gp2' => ['audio/3gpp2', 'video/3gpp2'],
        '3gpp' => ['audio/3gpp', 'audio/3gpp-encrypted', 'audio/x-rn-3gpp-amr', 'audio/x-rn-3gpp-amr-encrypted', 'audio/x-rn-3gpp-amr-wb', 'audio/x-rn-3gpp-amr-wb-encrypted', 'video/3gp', 'video/3gpp', 'video/3gpp-encrypted'],
        '3gpp2' => ['audio/3gpp2', 'video/3gpp2'],
        '7z' => ['application/x-7z-compressed'],
        'BLEND' => ['application/x-blender'],
        'C' => ['text/x-c++src'],
        'PAR2' => ['application/x-par2'],
        'PL' => ['application/x-perl', 'text/x-perl'],
        'Z' => ['application/x-compress'],
        'a' => ['application/x-archive'],
        'a26' => ['application/x-atari-2600-rom'],
        'a78' => ['application/x-atari-7800-rom'],
        'aa' => ['audio/vnd.audible', 'audio/vnd.audible.aax', 'audio/x-pn-audibleaudio'],
        'aab' => ['application/x-authorware-bin'],
        'aac' => ['audio/aac', 'audio/x-aac', 'audio/x-hx-aac-adts'],
        'aam' => ['application/x-authorware-map'],
        'aas' => ['application/x-authorware-seg'],
        'aax' => ['audio/vnd.audible', 'audio/vnd.audible.aax', 'audio/x-pn-audibleaudio'],
        'abw' => ['application/x-abiword'],
        'abw.CRASHED' => ['application/x-abiword'],
        'abw.gz' => ['application/x-abiword'],
        'ac' => ['application/pkix-attr-cert'],
        'ac3' => ['audio/ac3'],
        'acc' => ['application/vnd.americandynamics.acc'],
        'ace' => ['application/x-ace', 'application/x-ace-compressed'],
        'acu' => ['application/vnd.acucobol'],
        'acutc' => ['application/vnd.acucorp'],
        'adb' => ['text/x-adasrc'],
        'adf' => ['application/x-amiga-disk-format'],
        'adp' => ['audio/adpcm'],
        'ads' => ['text/x-adasrc'],
        'adts' => ['audio/aac', 'audio/x-aac', 'audio/x-hx-aac-adts'],
        'aep' => ['application/vnd.audiograph'],
        'afm' => ['application/x-font-afm', 'application/x-font-type1'],
        'afp' => ['application/vnd.ibm.modcap'],
        'ag' => ['image/x-applix-graphics'],
        'agb' => ['application/x-gba-rom'],
        'ahead' => ['application/vnd.ahead.space'],
        'ai' => ['application/illustrator', 'application/postscript', 'application/vnd.adobe.illustrator'],
        'aif' => ['audio/x-aiff'],
        'aifc' => ['audio/x-aifc', 'audio/x-aiff', 'audio/x-aiffc'],
        'aiff' => ['audio/x-aiff'],
        'aiffc' => ['audio/x-aifc', 'audio/x-aiffc'],
        'air' => ['application/vnd.adobe.air-application-installer-package+zip'],
        'ait' => ['application/vnd.dvb.ait'],
        'al' => ['application/x-perl', 'text/x-perl'],
        'alz' => ['application/x-alz'],
        'ami' => ['application/vnd.amiga.ami'],
        'amr' => ['audio/amr', 'audio/amr-encrypted'],
        'amz' => ['audio/x-amzxml'],
        'ani' => ['application/x-navi-animation'],
        'anim[1-9j]' => ['video/x-anim'],
        'anx' => ['application/annodex', 'application/x-annodex'],
        'ape' => ['audio/x-ape'],
        'apk' => ['application/vnd.android.package-archive'],
        'appcache' => ['text/cache-manifest'],
        'appimage' => ['application/vnd.appimage', 'application/x-iso9660-appimage'],
        'application' => ['application/x-ms-application'],
        'apr' => ['application/vnd.lotus-approach'],
        'aps' => ['application/postscript'],
        'ar' => ['application/x-archive'],
        'arc' => ['application/x-freearc'],
        'arj' => ['application/x-arj'],
        'arw' => ['image/x-sony-arw'],
        'as' => ['application/x-applix-spreadsheet'],
        'asc' => ['application/pgp', 'application/pgp-encrypted', 'application/pgp-keys', 'application/pgp-signature', 'text/plain'],
        'asf' => ['application/vnd.ms-asf', 'video/x-ms-asf', 'video/x-ms-asf-plugin', 'video/x-ms-wm'],
        'asm' => ['text/x-asm'],
        'aso' => ['application/vnd.accpac.simply.aso'],
        'asp' => ['application/x-asp'],
        'ass' => ['audio/aac', 'audio/x-aac', 'audio/x-hx-aac-adts', 'text/x-ssa'],
        'asx' => ['application/x-ms-asx', 'audio/x-ms-asx', 'video/x-ms-asf', 'video/x-ms-wax', 'video/x-ms-wmx', 'video/x-ms-wvx'],
        'atc' => ['application/vnd.acucorp'],
        'atom' => ['application/atom+xml'],
        'atomcat' => ['application/atomcat+xml'],
        'atomsvc' => ['application/atomsvc+xml'],
        'atx' => ['application/vnd.antix.game-component'],
        'au' => ['audio/basic'],
        'automount' => ['text/x-systemd-unit'],
        'avf' => ['video/avi', 'video/divx', 'video/msvideo', 'video/vnd.divx', 'video/x-avi', 'video/x-msvideo'],
        'avi' => ['video/avi', 'video/divx', 'video/msvideo', 'video/vnd.divx', 'video/x-avi', 'video/x-msvideo'],
        'aw' => ['application/applixware', 'application/x-applix-word'],
        'awb' => ['audio/amr-wb', 'audio/amr-wb-encrypted'],
        'awk' => ['application/x-awk'],
        'axa' => ['audio/annodex', 'audio/x-annodex'],
        'axv' => ['video/annodex', 'video/x-annodex'],
        'azf' => ['application/vnd.airzip.filesecure.azf'],
        'azs' => ['application/vnd.airzip.filesecure.azs'],
        'azw' => ['application/vnd.amazon.ebook'],
        'bak' => ['application/x-trash'],
        'bat' => ['application/x-msdownload'],
        'bcpio' => ['application/x-bcpio'],
        'bdf' => ['application/x-font-bdf'],
        'bdm' => ['application/vnd.syncml.dm+wbxml', 'video/mp2t'],
        'bdmv' => ['video/mp2t'],
        'bed' => ['application/vnd.realvnc.bed'],
        'bh2' => ['application/vnd.fujitsu.oasysprs'],
        'bib' => ['text/x-bibtex'],
        'bin' => ['application/octet-stream', 'application/x-saturn-rom', 'application/x-sega-cd-rom'],
        'blb' => ['application/x-blorb'],
        'blend' => ['application/x-blender'],
        'blender' => ['application/x-blender'],
        'blorb' => ['application/x-blorb'],
        'bmi' => ['application/vnd.bmi'],
        'bmp' => ['image/bmp', 'image/x-bmp', 'image/x-ms-bmp'],
        'book' => ['application/vnd.framemaker'],
        'box' => ['application/vnd.previewsystems.box'],
        'boz' => ['application/x-bzip2'],
        'bpk' => ['application/octet-stream'],
        'bsdiff' => ['application/x-bsdiff'],
        'btif' => ['image/prs.btif'],
        'bz' => ['application/x-bzip', 'application/x-bzip2'],
        'bz2' => ['application/x-bz2', 'application/x-bzip', 'application/x-bzip2'],
        'c' => ['text/x-c', 'text/x-csrc'],
        'c++' => ['text/x-c++src'],
        'c11amc' => ['application/vnd.cluetrust.cartomobile-config'],
        'c11amz' => ['application/vnd.cluetrust.cartomobile-config-pkg'],
        'c4d' => ['application/vnd.clonk.c4group'],
        'c4f' => ['application/vnd.clonk.c4group'],
        'c4g' => ['application/vnd.clonk.c4group'],
        'c4p' => ['application/vnd.clonk.c4group'],
        'c4u' => ['application/vnd.clonk.c4group'],
        'cab' => ['application/vnd.ms-cab-compressed', 'zz-application/zz-winassoc-cab'],
        'caf' => ['audio/x-caf'],
        'cap' => ['application/pcap', 'application/vnd.tcpdump.pcap', 'application/x-pcap'],
        'car' => ['application/vnd.curl.car'],
        'cat' => ['application/vnd.ms-pki.seccat'],
        'cb7' => ['application/x-cb7', 'application/x-cbr'],
        'cba' => ['application/x-cbr'],
        'cbl' => ['text/x-cobol'],
        'cbr' => ['application/vnd.comicbook-rar', 'application/x-cbr'],
        'cbt' => ['application/x-cbr', 'application/x-cbt'],
        'cbz' => ['application/vnd.comicbook+zip', 'application/x-cbr', 'application/x-cbz'],
        'cc' => ['text/x-c', 'text/x-c++src'],
        'ccmx' => ['application/x-ccmx'],
        'cct' => ['application/x-director'],
        'ccxml' => ['application/ccxml+xml'],
        'cdbcmsg' => ['application/vnd.contact.cmsg'],
        'cdf' => ['application/x-netcdf'],
        'cdkey' => ['application/vnd.mediastation.cdkey'],
        'cdmia' => ['application/cdmi-capability'],
        'cdmic' => ['application/cdmi-container'],
        'cdmid' => ['application/cdmi-domain'],
        'cdmio' => ['application/cdmi-object'],
        'cdmiq' => ['application/cdmi-queue'],
        'cdr' => ['application/cdr', 'application/coreldraw', 'application/vnd.corel-draw', 'application/x-cdr', 'application/x-coreldraw', 'image/cdr', 'image/x-cdr', 'zz-application/zz-winassoc-cdr'],
        'cdx' => ['chemical/x-cdx'],
        'cdxml' => ['application/vnd.chemdraw+xml'],
        'cdy' => ['application/vnd.cinderella'],
        'cer' => ['application/pkix-cert'],
        'cert' => ['application/x-x509-ca-cert'],
        'cfs' => ['application/x-cfs-compressed'],
        'cgb' => ['application/x-gameboy-color-rom'],
        'cgm' => ['image/cgm'],
        'chat' => ['application/x-chat'],
        'chm' => ['application/vnd.ms-htmlhelp', 'application/x-chm'],
        'chrt' => ['application/vnd.kde.kchart', 'application/x-kchart'],
        'cif' => ['chemical/x-cif'],
        'cii' => ['application/vnd.anser-web-certificate-issue-initiation'],
        'cil' => ['application/vnd.ms-artgalry'],
        'cl' => ['text/x-opencl-src'],
        'cla' => ['application/vnd.claymore'],
        'class' => ['application/java', 'application/java-byte-code', 'application/java-vm', 'application/x-java', 'application/x-java-class', 'application/x-java-vm'],
        'clkk' => ['application/vnd.crick.clicker.keyboard'],
        'clkp' => ['application/vnd.crick.clicker.palette'],
        'clkt' => ['application/vnd.crick.clicker.template'],
        'clkw' => ['application/vnd.crick.clicker.wordbank'],
        'clkx' => ['application/vnd.crick.clicker'],
        'clp' => ['application/x-msclip'],
        'clpi' => ['video/mp2t'],
        'cls' => ['application/x-tex', 'text/x-tex'],
        'cmake' => ['text/x-cmake'],
        'cmc' => ['application/vnd.cosmocaller'],
        'cmdf' => ['chemical/x-cmdf'],
        'cml' => ['chemical/x-cml'],
        'cmp' => ['application/vnd.yellowriver-custom-menu'],
        'cmx' => ['image/x-cmx'],
        'cob' => ['text/x-cobol'],
        'cod' => ['application/vnd.rim.cod'],
        'coffee' => ['application/vnd.coffeescript'],
        'com' => ['application/x-msdownload'],
        'conf' => ['text/plain'],
        'cpi' => ['video/mp2t'],
        'cpio' => ['application/x-cpio'],
        'cpio.gz' => ['application/x-cpio-compressed'],
        'cpp' => ['text/x-c', 'text/x-c++src'],
        'cpt' => ['application/mac-compactpro'],
        'cr2' => ['image/x-canon-cr2'],
        'crd' => ['application/x-mscardfile'],
        'crdownload' => ['application/x-partial-download'],
        'crl' => ['application/pkix-crl'],
        'crt' => ['application/x-x509-ca-cert'],
        'crw' => ['image/x-canon-crw'],
        'cryptonote' => ['application/vnd.rig.cryptonote'],
        'cs' => ['text/x-csharp'],
        'csh' => ['application/x-csh'],
        'csml' => ['chemical/x-csml'],
        'csp' => ['application/vnd.commonspace'],
        'css' => ['text/css'],
        'cst' => ['application/x-director'],
        'csv' => ['text/csv', 'text/x-comma-separated-values', 'text/x-csv'],
        'csvs' => ['text/csv-schema'],
        'cu' => ['application/cu-seeme'],
        'cue' => ['application/x-cue'],
        'cur' => ['image/x-win-bitmap'],
        'curl' => ['text/vnd.curl'],
        'cww' => ['application/prs.cww'],
        'cxt' => ['application/x-director'],
        'cxx' => ['text/x-c', 'text/x-c++src'],
        'd' => ['text/x-dsrc'],
        'dae' => ['model/vnd.collada+xml'],
        'daf' => ['application/vnd.mobius.daf'],
        'dar' => ['application/x-dar'],
        'dart' => ['application/vnd.dart'],
        'dataless' => ['application/vnd.fdsn.seed'],
        'davmount' => ['application/davmount+xml'],
        'dbf' => ['application/dbase', 'application/dbf', 'application/x-dbase', 'application/x-dbf'],
        'dbk' => ['application/docbook+xml', 'application/vnd.oasis.docbook+xml', 'application/x-docbook+xml'],
        'dc' => ['application/x-dc-rom'],
        'dcl' => ['text/x-dcl'],
        'dcm' => ['application/dicom'],
        'dcr' => ['application/x-director', 'image/x-kodak-dcr'],
        'dcurl' => ['text/vnd.curl.dcurl'],
        'dd2' => ['application/vnd.oma.dd2+xml'],
        'ddd' => ['application/vnd.fujixerox.ddd'],
        'dds' => ['image/x-dds'],
        'deb' => ['application/vnd.debian.binary-package', 'application/x-deb', 'application/x-debian-package'],
        'def' => ['text/plain'],
        'deploy' => ['application/octet-stream'],
        'der' => ['application/x-x509-ca-cert'],
        'desktop' => ['application/x-desktop', 'application/x-gnome-app-info'],
        'device' => ['text/x-systemd-unit'],
        'dfac' => ['application/vnd.dreamfactory'],
        'dgc' => ['application/x-dgc-compressed'],
        'di' => ['text/x-dsrc'],
        'dia' => ['application/x-dia-diagram'],
        'dib' => ['image/bmp', 'image/x-bmp', 'image/x-ms-bmp'],
        'dic' => ['text/x-c'],
        'diff' => ['text/x-diff', 'text/x-patch'],
        'dir' => ['application/x-director'],
        'dis' => ['application/vnd.mobius.dis'],
        'dist' => ['application/octet-stream'],
        'distz' => ['application/octet-stream'],
        'divx' => ['video/avi', 'video/divx', 'video/msvideo', 'video/vnd.divx', 'video/x-avi', 'video/x-msvideo'],
        'djv' => ['image/vnd.djvu', 'image/vnd.djvu+multipage', 'image/x-djvu', 'image/x.djvu'],
        'djvu' => ['image/vnd.djvu', 'image/vnd.djvu+multipage', 'image/x-djvu', 'image/x.djvu'],
        'dll' => ['application/x-msdownload'],
        'dmg' => ['application/x-apple-diskimage'],
        'dmp' => ['application/pcap', 'application/vnd.tcpdump.pcap', 'application/x-pcap'],
        'dms' => ['application/octet-stream'],
        'dna' => ['application/vnd.dna'],
        'dng' => ['image/x-adobe-dng'],
        'doc' => ['application/msword', 'application/vnd.ms-word', 'application/x-msword', 'zz-application/zz-winassoc-doc'],
        'docbook' => ['application/docbook+xml', 'application/vnd.oasis.docbook+xml', 'application/x-docbook+xml'],
        'docm' => ['application/vnd.ms-word.document.macroenabled.12'],
        'docx' => ['application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
        'dot' => ['application/msword', 'application/msword-template', 'text/vnd.graphviz'],
        'dotm' => ['application/vnd.ms-word.template.macroenabled.12'],
        'dotx' => ['application/vnd.openxmlformats-officedocument.wordprocessingml.template'],
        'dp' => ['application/vnd.osgi.dp'],
        'dpg' => ['application/vnd.dpgraph'],
        'dra' => ['audio/vnd.dra'],
        'dsc' => ['text/prs.lines.tag'],
        'dsl' => ['text/x-dsl'],
        'dssc' => ['application/dssc+der'],
        'dtb' => ['application/x-dtbook+xml'],
        'dtd' => ['application/xml-dtd', 'text/x-dtd'],
        'dts' => ['audio/vnd.dts', 'audio/x-dts'],
        'dtshd' => ['audio/vnd.dts.hd', 'audio/x-dtshd'],
        'dtx' => ['application/x-tex', 'text/x-tex'],
        'dump' => ['application/octet-stream'],
        'dv' => ['video/dv'],
        'dvb' => ['video/vnd.dvb.file'],
        'dvi' => ['application/x-dvi'],
        'dvi.bz2' => ['application/x-bzdvi'],
        'dvi.gz' => ['application/x-gzdvi'],
        'dwf' => ['model/vnd.dwf'],
        'dwg' => ['image/vnd.dwg'],
        'dxf' => ['image/vnd.dxf'],
        'dxp' => ['application/vnd.spotfire.dxp'],
        'dxr' => ['application/x-director'],
        'e' => ['text/x-eiffel'],
        'ecelp4800' => ['audio/vnd.nuera.ecelp4800'],
        'ecelp7470' => ['audio/vnd.nuera.ecelp7470'],
        'ecelp9600' => ['audio/vnd.nuera.ecelp9600'],
        'ecma' => ['application/ecmascript'],
        'edm' => ['application/vnd.novadigm.edm'],
        'edx' => ['application/vnd.novadigm.edx'],
        'efif' => ['application/vnd.picsel'],
        'egon' => ['application/x-egon'],
        'ei6' => ['application/vnd.pg.osasli'],
        'eif' => ['text/x-eiffel'],
        'el' => ['text/x-emacs-lisp'],
        'elc' => ['application/octet-stream'],
        'emf' => ['application/emf', 'application/x-emf', 'application/x-msmetafile', 'image/emf', 'image/x-emf'],
        'eml' => ['message/rfc822'],
        'emma' => ['application/emma+xml'],
        'emp' => ['application/vnd.emusic-emusic_package'],
        'emz' => ['application/x-msmetafile'],
        'ent' => ['application/xml-external-parsed-entity', 'text/xml-external-parsed-entity'],
        'eol' => ['audio/vnd.digital-winds'],
        'eot' => ['application/vnd.ms-fontobject'],
        'eps' => ['application/postscript', 'image/x-eps'],
        'eps.bz2' => ['image/x-bzeps'],
        'eps.gz' => ['image/x-gzeps'],
        'epsf' => ['image/x-eps'],
        'epsf.bz2' => ['image/x-bzeps'],
        'epsf.gz' => ['image/x-gzeps'],
        'epsi' => ['image/x-eps'],
        'epsi.bz2' => ['image/x-bzeps'],
        'epsi.gz' => ['image/x-gzeps'],
        'epub' => ['application/epub+zip'],
        'erl' => ['text/x-erlang'],
        'es' => ['application/ecmascript', 'text/ecmascript'],
        'es3' => ['application/vnd.eszigno3+xml'],
        'esa' => ['application/vnd.osgi.subsystem'],
        'esf' => ['application/vnd.epson.esf'],
        'et3' => ['application/vnd.eszigno3+xml'],
        'etheme' => ['application/x-e-theme'],
        'etx' => ['text/x-setext'],
        'eva' => ['application/x-eva'],
        'evy' => ['application/x-envoy'],
        'exe' => ['application/x-ms-dos-executable', 'application/x-msdownload'],
        'exi' => ['application/exi'],
        'exr' => ['image/x-exr'],
        'ext' => ['application/vnd.novadigm.ext'],
        'ez' => ['application/andrew-inset'],
        'ez2' => ['application/vnd.ezpix-album'],
        'ez3' => ['application/vnd.ezpix-package'],
        'f' => ['text/x-fortran'],
        'f4a' => ['audio/m4a', 'audio/mp4', 'audio/x-m4a'],
        'f4b' => ['audio/x-m4b'],
        'f4v' => ['video/mp4', 'video/mp4v-es', 'video/x-f4v', 'video/x-m4v'],
        'f77' => ['text/x-fortran'],
        'f90' => ['text/x-fortran'],
        'f95' => ['text/x-fortran'],
        'fb2' => ['application/x-fictionbook', 'application/x-fictionbook+xml'],
        'fb2.zip' => ['application/x-zip-compressed-fb2'],
        'fbs' => ['image/vnd.fastbidsheet'],
        'fcdt' => ['application/vnd.adobe.formscentral.fcdt'],
        'fcs' => ['application/vnd.isac.fcs'],
        'fd' => ['application/x-fd-file', 'application/x-raw-floppy-disk-image'],
        'fdf' => ['application/vnd.fdf'],
        'fds' => ['application/x-fds-disk'],
        'fe_launch' => ['application/vnd.denovo.fcselayout-link'],
        'feature' => ['text/x-gherkin'],
        'fg5' => ['application/vnd.fujitsu.oasysgp'],
        'fgd' => ['application/x-director'],
        'fh' => ['image/x-freehand'],
        'fh4' => ['image/x-freehand'],
        'fh5' => ['image/x-freehand'],
        'fh7' => ['image/x-freehand'],
        'fhc' => ['image/x-freehand'],
        'fig' => ['application/x-xfig', 'image/x-xfig'],
        'fits' => ['image/fits', 'image/x-fits'],
        'fl' => ['application/x-fluid'],
        'flac' => ['audio/flac', 'audio/x-flac'],
        'flatpak' => ['application/vnd.flatpak', 'application/vnd.xdgapp'],
        'flatpakref' => ['application/vnd.flatpak.ref'],
        'flatpakrepo' => ['application/vnd.flatpak.repo'],
        'flc' => ['video/fli', 'video/x-fli', 'video/x-flic'],
        'fli' => ['video/fli', 'video/x-fli', 'video/x-flic'],
        'flo' => ['application/vnd.micrografx.flo'],
        'flv' => ['video/x-flv', 'application/x-flash-video', 'flv-application/octet-stream', 'video/flv'],
        'flw' => ['application/vnd.kde.kivio', 'application/x-kivio'],
        'flx' => ['text/vnd.fmi.flexstor'],
        'fly' => ['text/vnd.fly'],
        'fm' => ['application/vnd.framemaker', 'application/x-frame'],
        'fnc' => ['application/vnd.frogans.fnc'],
        'fo' => ['text/x-xslfo'],
        'fodg' => ['application/vnd.oasis.opendocument.graphics-flat-xml'],
        'fodp' => ['application/vnd.oasis.opendocument.presentation-flat-xml'],
        'fods' => ['application/vnd.oasis.opendocument.spreadsheet-flat-xml'],
        'fodt' => ['application/vnd.oasis.opendocument.text-flat-xml'],
        'for' => ['text/x-fortran'],
        'fpx' => ['image/vnd.fpx'],
        'frame' => ['application/vnd.framemaker'],
        'fsc' => ['application/vnd.fsc.weblaunch'],
        'fst' => ['image/vnd.fst'],
        'ftc' => ['application/vnd.fluxtime.clip'],
        'fti' => ['application/vnd.anser-web-funds-transfer-initiation'],
        'fvt' => ['video/vnd.fvt'],
        'fxm' => ['video/x-javafx'],
        'fxp' => ['application/vnd.adobe.fxp'],
        'fxpl' => ['application/vnd.adobe.fxp'],
        'fzs' => ['application/vnd.fuzzysheet'],
        'g2w' => ['application/vnd.geoplan'],
        'g3' => ['image/fax-g3', 'image/g3fax'],
        'g3w' => ['application/vnd.geospace'],
        'gac' => ['application/vnd.groove-account'],
        'gam' => ['application/x-tads'],
        'gb' => ['application/x-gameboy-rom'],
        'gba' => ['application/x-gba-rom'],
        'gbc' => ['application/x-gameboy-color-rom'],
        'gbr' => ['application/rpki-ghostbusters', 'image/x-gimp-gbr'],
        'gca' => ['application/x-gca-compressed'],
        'gcode' => ['text/x.gcode'],
        'gcrd' => ['text/directory', 'text/vcard', 'text/x-vcard'],
        'gdl' => ['model/vnd.gdl'],
        'ged' => ['application/x-gedcom', 'text/gedcom'],
        'gedcom' => ['application/x-gedcom', 'text/gedcom'],
        'gem' => ['application/x-gtar', 'application/x-tar'],
        'gen' => ['application/x-genesis-rom'],
        'geo' => ['application/vnd.dynageo'],
        'geo.json' => ['application/geo+json', 'application/vnd.geo+json'],
        'geojson' => ['application/geo+json', 'application/vnd.geo+json'],
        'gex' => ['application/vnd.geometry-explorer'],
        'gf' => ['application/x-tex-gf'],
        'gg' => ['application/x-gamegear-rom'],
        'ggb' => ['application/vnd.geogebra.file'],
        'ggt' => ['application/vnd.geogebra.tool'],
        'ghf' => ['application/vnd.groove-help'],
        'gif' => ['image/gif'],
        'gih' => ['image/x-gimp-gih'],
        'gim' => ['application/vnd.groove-identity-message'],
        'glade' => ['application/x-glade'],
        'gml' => ['application/gml+xml'],
        'gmo' => ['application/x-gettext-translation'],
        'gmx' => ['application/vnd.gmx'],
        'gnc' => ['application/x-gnucash'],
        'gnd' => ['application/gnunet-directory'],
        'gnucash' => ['application/x-gnucash'],
        'gnumeric' => ['application/x-gnumeric'],
        'gnuplot' => ['application/x-gnuplot'],
        'go' => ['text/x-go'],
        'gp' => ['application/x-gnuplot'],
        'gpg' => ['application/pgp', 'application/pgp-encrypted', 'application/pgp-keys', 'application/pgp-signature'],
        'gph' => ['application/vnd.flographit'],
        'gplt' => ['application/x-gnuplot'],
        'gpx' => ['application/gpx', 'application/gpx+xml', 'application/x-gpx', 'application/x-gpx+xml'],
        'gqf' => ['application/vnd.grafeq'],
        'gqs' => ['application/vnd.grafeq'],
        'gra' => ['application/x-graphite'],
        'gram' => ['application/srgs'],
        'gramps' => ['application/x-gramps-xml'],
        'gre' => ['application/vnd.geometry-explorer'],
        'grv' => ['application/vnd.groove-injector'],
        'grxml' => ['application/srgs+xml'],
        'gs' => ['text/x-genie'],
        'gsf' => ['application/x-font-ghostscript', 'application/x-font-type1'],
        'gsm' => ['audio/x-gsm'],
        'gtar' => ['application/x-gtar', 'application/x-tar'],
        'gtm' => ['application/vnd.groove-tool-message'],
        'gtw' => ['model/vnd.gtw'],
        'gv' => ['text/vnd.graphviz'],
        'gvp' => ['text/google-video-pointer', 'text/x-google-video-pointer'],
        'gxf' => ['application/gxf'],
        'gxt' => ['application/vnd.geonext'],
        'gz' => ['application/x-gzip', 'application/gzip'],
        'h' => ['text/x-c', 'text/x-chdr'],
        'h++' => ['text/x-c++hdr'],
        'h261' => ['video/h261'],
        'h263' => ['video/h263'],
        'h264' => ['video/h264'],
        'h4' => ['application/x-hdf'],
        'h5' => ['application/x-hdf'],
        'hal' => ['application/vnd.hal+xml'],
        'hbci' => ['application/vnd.hbci'],
        'hdf' => ['application/x-hdf'],
        'hdf4' => ['application/x-hdf'],
        'hdf5' => ['application/x-hdf'],
        'heic' => ['image/heic', 'image/heic-sequence', 'image/heif', 'image/heif-sequence'],
        'heif' => ['image/heic', 'image/heic-sequence', 'image/heif', 'image/heif-sequence'],
        'hfe' => ['application/x-hfe-file', 'application/x-hfe-floppy-image'],
        'hh' => ['text/x-c', 'text/x-c++hdr'],
        'hlp' => ['application/winhlp', 'zz-application/zz-winassoc-hlp'],
        'hp' => ['text/x-c++hdr'],
        'hpgl' => ['application/vnd.hp-hpgl'],
        'hpid' => ['application/vnd.hp-hpid'],
        'hpp' => ['text/x-c++hdr'],
        'hps' => ['application/vnd.hp-hps'],
        'hqx' => ['application/stuffit', 'application/mac-binhex40'],
        'hs' => ['text/x-haskell'],
        'htke' => ['application/vnd.kenameaapp'],
        'htm' => ['text/html'],
        'html' => ['text/html'],
        'hvd' => ['application/vnd.yamaha.hv-dic'],
        'hvp' => ['application/vnd.yamaha.hv-voice'],
        'hvs' => ['application/vnd.yamaha.hv-script'],
        'hwp' => ['application/vnd.haansoft-hwp', 'application/x-hwp'],
        'hwt' => ['application/vnd.haansoft-hwt', 'application/x-hwt'],
        'hxx' => ['text/x-c++hdr'],
        'i2g' => ['application/vnd.intergeo'],
        'ica' => ['application/x-ica'],
        'icb' => ['image/x-icb', 'image/x-tga'],
        'icc' => ['application/vnd.iccprofile'],
        'ice' => ['x-conference/x-cooltalk'],
        'icm' => ['application/vnd.iccprofile'],
        'icns' => ['image/x-icns'],
        'ico' => ['application/ico', 'image/ico', 'image/icon', 'image/vnd.microsoft.icon', 'image/x-ico', 'image/x-icon', 'text/ico'],
        'ics' => ['application/ics', 'text/calendar', 'text/x-vcalendar'],
        'idl' => ['text/x-idl'],
        'ief' => ['image/ief'],
        'ifb' => ['text/calendar'],
        'iff' => ['image/x-iff', 'image/x-ilbm'],
        'ifm' => ['application/vnd.shana.informed.formdata'],
        'iges' => ['model/iges'],
        'igl' => ['application/vnd.igloader'],
        'igm' => ['application/vnd.insors.igm'],
        'igs' => ['model/iges'],
        'igx' => ['application/vnd.micrografx.igx'],
        'iif' => ['application/vnd.shana.informed.interchange'],
        'ilbm' => ['image/x-iff', 'image/x-ilbm'],
        'ime' => ['audio/imelody', 'audio/x-imelody', 'text/x-imelody'],
        'img' => ['application/x-raw-disk-image'],
        'img.xz' => ['application/x-raw-disk-image-xz-compressed'],
        'imp' => ['application/vnd.accpac.simply.imp'],
        'ims' => ['application/vnd.ms-ims'],
        'imy' => ['audio/imelody', 'audio/x-imelody', 'text/x-imelody'],
        'in' => ['text/plain'],
        'ink' => ['application/inkml+xml'],
        'inkml' => ['application/inkml+xml'],
        'ins' => ['application/x-tex', 'text/x-tex'],
        'install' => ['application/x-install-instructions'],
        'iota' => ['application/vnd.astraea-software.iota'],
        'ipfix' => ['application/ipfix'],
        'ipk' => ['application/vnd.shana.informed.package'],
        'iptables' => ['text/x-iptables'],
        'ipynb' => ['application/x-ipynb+json'],
        'irm' => ['application/vnd.ibm.rights-management'],
        'irp' => ['application/vnd.irepository.package+xml'],
        'iso' => ['application/x-cd-image', 'application/x-gamecube-iso-image', 'application/x-gamecube-rom', 'application/x-iso9660-image', 'application/x-saturn-rom', 'application/x-sega-cd-rom', 'application/x-wbfs', 'application/x-wia', 'application/x-wii-iso-image', 'application/x-wii-rom'],
        'iso9660' => ['application/x-cd-image', 'application/x-iso9660-image'],
        'it' => ['audio/x-it'],
        'it87' => ['application/x-it87'],
        'itp' => ['application/vnd.shana.informed.formtemplate'],
        'ivp' => ['application/vnd.immervision-ivp'],
        'ivu' => ['application/vnd.immervision-ivu'],
        'j2c' => ['image/x-jp2-codestream'],
        'j2k' => ['image/x-jp2-codestream'],
        'jad' => ['text/vnd.sun.j2me.app-descriptor'],
        'jam' => ['application/vnd.jam'],
        'jar' => ['application/x-java-archive', 'application/java-archive', 'application/x-jar'],
        'java' => ['text/x-java', 'text/x-java-source'],
        'jceks' => ['application/x-java-jce-keystore'],
        'jisp' => ['application/vnd.jisp'],
        'jks' => ['application/x-java-keystore'],
        'jlt' => ['application/vnd.hp-jlyt'],
        'jng' => ['image/x-jng'],
        'jnlp' => ['application/x-java-jnlp-file'],
        'joda' => ['application/vnd.joost.joda-archive'],
        'jp2' => ['image/jp2', 'image/jpeg2000', 'image/jpeg2000-image', 'image/x-jpeg2000-image'],
        'jpc' => ['image/x-jp2-codestream'],
        'jpe' => ['image/jpeg', 'image/pjpeg'],
        'jpeg' => ['image/jpeg', 'image/pjpeg'],
        'jpf' => ['image/jpx'],
        'jpg' => ['image/jpeg', 'image/pjpeg'],
        'jpg2' => ['image/jp2', 'image/jpeg2000', 'image/jpeg2000-image', 'image/x-jpeg2000-image'],
        'jpgm' => ['image/jpm', 'video/jpm'],
        'jpgv' => ['video/jpeg'],
        'jpm' => ['image/jpm', 'video/jpm'],
        'jpr' => ['application/x-jbuilder-project'],
        'jpx' => ['application/x-jbuilder-project', 'image/jpx'],
        'jrd' => ['application/jrd+json'],
        'js' => ['text/javascript', 'application/javascript', 'application/x-javascript'],
        'jsm' => ['application/javascript', 'application/x-javascript', 'text/javascript'],
        'json' => ['application/json'],
        'json-patch' => ['application/json-patch+json'],
        'jsonld' => ['application/ld+json'],
        'jsonml' => ['application/jsonml+json'],
        'k25' => ['image/x-kodak-k25'],
        'k7' => ['application/x-thomson-cassette'],
        'kar' => ['audio/midi', 'audio/x-midi'],
        'karbon' => ['application/vnd.kde.karbon', 'application/x-karbon'],
        'kdc' => ['image/x-kodak-kdc'],
        'kdelnk' => ['application/x-desktop', 'application/x-gnome-app-info'],
        'kexi' => ['application/x-kexiproject-sqlite', 'application/x-kexiproject-sqlite2', 'application/x-kexiproject-sqlite3', 'application/x-vnd.kde.kexi'],
        'kexic' => ['application/x-kexi-connectiondata'],
        'kexis' => ['application/x-kexiproject-shortcut'],
        'key' => ['application/vnd.apple.keynote', 'application/x-iwork-keynote-sffkey'],
        'kfo' => ['application/vnd.kde.kformula', 'application/x-kformula'],
        'kia' => ['application/vnd.kidspiration'],
        'kil' => ['application/x-killustrator'],
        'kino' => ['application/smil', 'application/smil+xml'],
        'kml' => ['application/vnd.google-earth.kml+xml'],
        'kmz' => ['application/vnd.google-earth.kmz'],
        'kne' => ['application/vnd.kinar'],
        'knp' => ['application/vnd.kinar'],
        'kon' => ['application/vnd.kde.kontour', 'application/x-kontour'],
        'kpm' => ['application/x-kpovmodeler'],
        'kpr' => ['application/vnd.kde.kpresenter', 'application/x-kpresenter'],
        'kpt' => ['application/vnd.kde.kpresenter', 'application/x-kpresenter'],
        'kpxx' => ['application/vnd.ds-keypoint'],
        'kra' => ['application/x-krita'],
        'ks' => ['application/x-java-keystore'],
        'ksp' => ['application/vnd.kde.kspread', 'application/x-kspread'],
        'ktr' => ['application/vnd.kahootz'],
        'ktx' => ['image/ktx'],
        'ktz' => ['application/vnd.kahootz'],
        'kud' => ['application/x-kugar'],
        'kwd' => ['application/vnd.kde.kword', 'application/x-kword'],
        'kwt' => ['application/vnd.kde.kword', 'application/x-kword'],
        'la' => ['application/x-shared-library-la'],
        'lasxml' => ['application/vnd.las.las+xml'],
        'latex' => ['application/x-latex', 'application/x-tex', 'text/x-tex'],
        'lbd' => ['application/vnd.llamagraphics.life-balance.desktop'],
        'lbe' => ['application/vnd.llamagraphics.life-balance.exchange+xml'],
        'lbm' => ['image/x-iff', 'image/x-ilbm'],
        'ldif' => ['text/x-ldif'],
        'les' => ['application/vnd.hhe.lesson-player'],
        'lha' => ['application/x-lha', 'application/x-lzh-compressed'],
        'lhs' => ['text/x-literate-haskell'],
        'lhz' => ['application/x-lhz'],
        'link66' => ['application/vnd.route66.link66+xml'],
        'list' => ['text/plain'],
        'list3820' => ['application/vnd.ibm.modcap'],
        'listafp' => ['application/vnd.ibm.modcap'],
        'lnk' => ['application/x-ms-shortcut'],
        'lnx' => ['application/x-atari-lynx-rom'],
        'loas' => ['audio/usac'],
        'log' => ['text/plain', 'text/x-log'],
        'lostxml' => ['application/lost+xml'],
        'lrf' => ['application/octet-stream'],
        'lrm' => ['application/vnd.ms-lrm'],
        'lrv' => ['video/mp4', 'video/mp4v-es', 'video/x-m4v'],
        'lrz' => ['application/x-lrzip'],
        'ltf' => ['application/vnd.frogans.ltf'],
        'ltx' => ['application/x-tex', 'text/x-tex'],
        'lua' => ['text/x-lua'],
        'lvp' => ['audio/vnd.lucent.voice'],
        'lwo' => ['image/x-lwo'],
        'lwob' => ['image/x-lwo'],
        'lwp' => ['application/vnd.lotus-wordpro'],
        'lws' => ['image/x-lws'],
        'ly' => ['text/x-lilypond'],
        'lyx' => ['application/x-lyx', 'text/x-lyx'],
        'lz' => ['application/x-lzip'],
        'lz4' => ['application/x-lz4'],
        'lzh' => ['application/x-lha', 'application/x-lzh-compressed'],
        'lzma' => ['application/x-lzma'],
        'lzo' => ['application/x-lzop'],
        'm' => ['text/x-matlab', 'text/x-objcsrc', 'text/x-octave'],
        'm13' => ['application/x-msmediaview'],
        'm14' => ['application/x-msmediaview'],
        'm15' => ['audio/x-mod'],
        'm1u' => ['video/vnd.mpegurl', 'video/x-mpegurl'],
        'm1v' => ['video/mpeg'],
        'm21' => ['application/mp21'],
        'm2a' => ['audio/mpeg'],
        'm2t' => ['video/mp2t'],
        'm2ts' => ['video/mp2t'],
        'm2v' => ['video/mpeg'],
        'm3a' => ['audio/mpeg'],
        'm3u' => ['audio/x-mpegurl', 'application/m3u', 'application/vnd.apple.mpegurl', 'audio/m3u', 'audio/mpegurl', 'audio/x-m3u', 'audio/x-mp3-playlist'],
        'm3u8' => ['application/m3u', 'application/vnd.apple.mpegurl', 'audio/m3u', 'audio/mpegurl', 'audio/x-m3u', 'audio/x-mp3-playlist', 'audio/x-mpegurl'],
        'm4' => ['application/x-m4'],
        'm4a' => ['audio/mp4', 'audio/m4a', 'audio/x-m4a'],
        'm4b' => ['audio/x-m4b'],
        'm4r' => ['audio/x-m4r'],
        'm4u' => ['video/vnd.mpegurl', 'video/x-mpegurl'],
        'm4v' => ['video/mp4', 'video/mp4v-es', 'video/x-m4v'],
        'm7' => ['application/x-thomson-cartridge-memo7'],
        'ma' => ['application/mathematica'],
        'mab' => ['application/x-markaby'],
        'mads' => ['application/mads+xml'],
        'mag' => ['application/vnd.ecowin.chart'],
        'mak' => ['text/x-makefile'],
        'maker' => ['application/vnd.framemaker'],
        'man' => ['application/x-troff-man', 'text/troff'],
        'manifest' => ['text/cache-manifest'],
        'mar' => ['application/octet-stream'],
        'markdown' => ['text/markdown', 'text/x-markdown'],
        'mathml' => ['application/mathml+xml'],
        'mb' => ['application/mathematica'],
        'mbk' => ['application/vnd.mobius.mbk'],
        'mbox' => ['application/mbox'],
        'mc1' => ['application/vnd.medcalcdata'],
        'mcd' => ['application/vnd.mcd'],
        'mcurl' => ['text/vnd.curl.mcurl'],
        'md' => ['text/markdown', 'text/x-markdown'],
        'mdb' => ['application/x-msaccess', 'application/mdb', 'application/msaccess', 'application/vnd.ms-access', 'application/vnd.msaccess', 'application/x-mdb', 'zz-application/zz-winassoc-mdb'],
        'mdi' => ['image/vnd.ms-modi'],
        'mdx' => ['application/x-genesis-32x-rom'],
        'me' => ['text/troff', 'text/x-troff-me'],
        'med' => ['audio/x-mod'],
        'mesh' => ['model/mesh'],
        'meta4' => ['application/metalink4+xml'],
        'metalink' => ['application/metalink+xml'],
        'mets' => ['application/mets+xml'],
        'mfm' => ['application/vnd.mfmp'],
        'mft' => ['application/rpki-manifest'],
        'mgp' => ['application/vnd.osgeo.mapguide.package', 'application/x-magicpoint'],
        'mgz' => ['application/vnd.proteus.magazine'],
        'mht' => ['application/x-mimearchive'],
        'mhtml' => ['application/x-mimearchive'],
        'mid' => ['audio/midi', 'audio/x-midi'],
        'midi' => ['audio/midi', 'audio/x-midi'],
        'mie' => ['application/x-mie'],
        'mif' => ['application/vnd.mif', 'application/x-mif'],
        'mime' => ['message/rfc822'],
        'minipsf' => ['audio/x-minipsf'],
        'mj2' => ['video/mj2'],
        'mjp2' => ['video/mj2'],
        'mjpeg' => ['video/x-mjpeg'],
        'mjpg' => ['video/x-mjpeg'],
        'mjs' => ['application/javascript', 'application/x-javascript', 'text/javascript'],
        'mk' => ['text/x-makefile'],
        'mk3d' => ['video/x-matroska', 'video/x-matroska-3d'],
        'mka' => ['audio/x-matroska'],
        'mkd' => ['text/markdown', 'text/x-markdown'],
        'mks' => ['video/x-matroska'],
        'mkv' => ['video/x-matroska'],
        'ml' => ['text/x-ocaml'],
        'mli' => ['text/x-ocaml'],
        'mlp' => ['application/vnd.dolby.mlp'],
        'mm' => ['text/x-troff-mm'],
        'mmd' => ['application/vnd.chipnuts.karaoke-mmd'],
        'mmf' => ['application/vnd.smaf', 'application/x-smaf'],
        'mml' => ['application/mathml+xml', 'text/mathml'],
        'mmr' => ['image/vnd.fujixerox.edmics-mmr'],
        'mng' => ['video/x-mng'],
        'mny' => ['application/x-msmoney'],
        'mo' => ['application/x-gettext-translation', 'text/x-modelica'],
        'mo3' => ['audio/x-mo3'],
        'mobi' => ['application/x-mobipocket-ebook'],
        'moc' => ['text/x-moc'],
        'mod' => ['audio/x-mod'],
        'mods' => ['application/mods+xml'],
        'mof' => ['text/x-mof'],
        'moov' => ['video/quicktime'],
        'mount' => ['text/x-systemd-unit'],
        'mov' => ['video/quicktime'],
        'movie' => ['video/x-sgi-movie'],
        'mp+' => ['audio/x-musepack'],
        'mp2' => ['audio/mp2', 'audio/mpeg', 'audio/x-mp2', 'video/mpeg', 'video/mpeg-system', 'video/x-mpeg', 'video/x-mpeg-system', 'video/x-mpeg2'],
        'mp21' => ['application/mp21'],
        'mp2a' => ['audio/mpeg'],
        'mp3' => ['audio/mpeg', 'audio/mp3', 'audio/x-mp3', 'audio/x-mpeg', 'audio/x-mpg'],
        'mp4' => ['video/mp4', 'video/mp4v-es', 'video/x-m4v'],
        'mp4a' => ['audio/mp4'],
        'mp4s' => ['application/mp4'],
        'mp4v' => ['video/mp4'],
        'mpc' => ['application/vnd.mophun.certificate', 'audio/x-musepack'],
        'mpe' => ['video/mpeg', 'video/mpeg-system', 'video/x-mpeg', 'video/x-mpeg-system', 'video/x-mpeg2'],
        'mpeg' => ['video/mpeg', 'video/mpeg-system', 'video/x-mpeg', 'video/x-mpeg-system', 'video/x-mpeg2'],
        'mpg' => ['video/mpeg', 'video/mpeg-system', 'video/x-mpeg', 'video/x-mpeg-system', 'video/x-mpeg2'],
        'mpg4' => ['video/mp4'],
        'mpga' => ['audio/mp3', 'audio/mpeg', 'audio/x-mp3', 'audio/x-mpeg', 'audio/x-mpg'],
        'mpkg' => ['application/vnd.apple.installer+xml'],
        'mpl' => ['video/mp2t'],
        'mpls' => ['video/mp2t'],
        'mpm' => ['application/vnd.blueice.multipass'],
        'mpn' => ['application/vnd.mophun.application'],
        'mpp' => ['application/vnd.ms-project', 'audio/x-musepack'],
        'mpt' => ['application/vnd.ms-project'],
        'mpy' => ['application/vnd.ibm.minipay'],
        'mqy' => ['application/vnd.mobius.mqy'],
        'mrc' => ['application/marc'],
        'mrcx' => ['application/marcxml+xml'],
        'mrl' => ['text/x-mrml'],
        'mrml' => ['text/x-mrml'],
        'mrw' => ['image/x-minolta-mrw'],
        'ms' => ['text/troff', 'text/x-troff-ms'],
        'mscml' => ['application/mediaservercontrol+xml'],
        'mseed' => ['application/vnd.fdsn.mseed'],
        'mseq' => ['application/vnd.mseq'],
        'msf' => ['application/vnd.epson.msf'],
        'msg' => ['application/vnd.ms-outlook'],
        'msh' => ['model/mesh'],
        'msi' => ['application/x-msdownload', 'application/x-msi'],
        'msl' => ['application/vnd.mobius.msl'],
        'msod' => ['image/x-msod'],
        'msty' => ['application/vnd.muvee.style'],
        'msx' => ['application/x-msx-rom'],
        'mtm' => ['audio/x-mod'],
        'mts' => ['model/vnd.mts', 'video/mp2t'],
        'mup' => ['text/x-mup'],
        'mus' => ['application/vnd.musician'],
        'musicxml' => ['application/vnd.recordare.musicxml+xml'],
        'mvb' => ['application/x-msmediaview'],
        'mwf' => ['application/vnd.mfer'],
        'mxf' => ['application/mxf'],
        'mxl' => ['application/vnd.recordare.musicxml'],
        'mxml' => ['application/xv+xml'],
        'mxs' => ['application/vnd.triscape.mxs'],
        'mxu' => ['video/vnd.mpegurl', 'video/x-mpegurl'],
        'n-gage' => ['application/vnd.nokia.n-gage.symbian.install'],
        'n3' => ['text/n3'],
        'n64' => ['application/x-n64-rom'],
        'nb' => ['application/mathematica', 'application/x-mathematica'],
        'nbp' => ['application/vnd.wolfram.player'],
        'nc' => ['application/x-netcdf'],
        'ncx' => ['application/x-dtbncx+xml'],
        'nds' => ['application/x-nintendo-ds-rom'],
        'nef' => ['image/x-nikon-nef'],
        'nes' => ['application/x-nes-rom'],
        'nez' => ['application/x-nes-rom'],
        'nfo' => ['text/x-nfo'],
        'ngc' => ['application/x-neo-geo-pocket-color-rom'],
        'ngdat' => ['application/vnd.nokia.n-gage.data'],
        'ngp' => ['application/x-neo-geo-pocket-rom'],
        'nitf' => ['application/vnd.nitf'],
        'nlu' => ['application/vnd.neurolanguage.nlu'],
        'nml' => ['application/vnd.enliven'],
        'nnd' => ['application/vnd.noblenet-directory'],
        'nns' => ['application/vnd.noblenet-sealer'],
        'nnw' => ['application/vnd.noblenet-web'],
        'not' => ['text/x-mup'],
        'npx' => ['image/vnd.net-fpx'],
        'nsc' => ['application/x-conference', 'application/x-netshow-channel'],
        'nsf' => ['application/vnd.lotus-notes'],
        'nsv' => ['video/x-nsv'],
        'ntf' => ['application/vnd.nitf'],
        'nzb' => ['application/x-nzb'],
        'o' => ['application/x-object'],
        'oa2' => ['application/vnd.fujitsu.oasys2'],
        'oa3' => ['application/vnd.fujitsu.oasys3'],
        'oas' => ['application/vnd.fujitsu.oasys'],
        'obd' => ['application/x-msbinder'],
        'obj' => ['application/x-tgif'],
        'ocl' => ['text/x-ocl'],
        'oda' => ['application/oda'],
        'odb' => ['application/vnd.oasis.opendocument.database', 'application/vnd.sun.xml.base'],
        'odc' => ['application/vnd.oasis.opendocument.chart'],
        'odf' => ['application/vnd.oasis.opendocument.formula'],
        'odft' => ['application/vnd.oasis.opendocument.formula-template'],
        'odg' => ['application/vnd.oasis.opendocument.graphics'],
        'odi' => ['application/vnd.oasis.opendocument.image'],
        'odm' => ['application/vnd.oasis.opendocument.text-master'],
        'odp' => ['application/vnd.oasis.opendocument.presentation'],
        'ods' => ['application/vnd.oasis.opendocument.spreadsheet'],
        'odt' => ['application/vnd.oasis.opendocument.text'],
        'oga' => ['audio/ogg', 'audio/vorbis', 'audio/x-flac+ogg', 'audio/x-ogg', 'audio/x-oggflac', 'audio/x-speex+ogg', 'audio/x-vorbis', 'audio/x-vorbis+ogg'],
        'ogg' => ['audio/ogg', 'audio/vorbis', 'audio/x-flac+ogg', 'audio/x-ogg', 'audio/x-oggflac', 'audio/x-speex+ogg', 'audio/x-vorbis', 'audio/x-vorbis+ogg', 'video/ogg', 'video/x-ogg', 'video/x-theora', 'video/x-theora+ogg'],
        'ogm' => ['video/x-ogm', 'video/x-ogm+ogg'],
        'ogv' => ['video/ogg', 'video/x-ogg'],
        'ogx' => ['application/ogg', 'application/x-ogg'],
        'old' => ['application/x-trash'],
        'oleo' => ['application/x-oleo'],
        'omdoc' => ['application/omdoc+xml'],
        'onepkg' => ['application/onenote'],
        'onetmp' => ['application/onenote'],
        'onetoc' => ['application/onenote'],
        'onetoc2' => ['application/onenote'],
        'ooc' => ['text/x-ooc'],
        'opf' => ['application/oebps-package+xml'],
        'opml' => ['text/x-opml', 'text/x-opml+xml'],
        'oprc' => ['application/vnd.palm', 'application/x-palm-database'],
        'opus' => ['audio/ogg', 'audio/x-ogg', 'audio/x-opus+ogg'],
        'ora' => ['image/openraster'],
        'orf' => ['image/x-olympus-orf'],
        'org' => ['application/vnd.lotus-organizer'],
        'osf' => ['application/vnd.yamaha.openscoreformat'],
        'osfpvg' => ['application/vnd.yamaha.openscoreformat.osfpvg+xml'],
        'otc' => ['application/vnd.oasis.opendocument.chart-template'],
        'otf' => ['application/vnd.oasis.opendocument.formula-template', 'application/x-font-otf', 'font/otf'],
        'otg' => ['application/vnd.oasis.opendocument.graphics-template'],
        'oth' => ['application/vnd.oasis.opendocument.text-web'],
        'oti' => ['application/vnd.oasis.opendocument.image-template'],
        'otp' => ['application/vnd.oasis.opendocument.presentation-template'],
        'ots' => ['application/vnd.oasis.opendocument.spreadsheet-template'],
        'ott' => ['application/vnd.oasis.opendocument.text-template'],
        'owl' => ['application/rdf+xml', 'text/rdf'],
        'owx' => ['application/owl+xml'],
        'oxps' => ['application/oxps', 'application/vnd.ms-xpsdocument', 'application/xps'],
        'oxt' => ['application/vnd.openofficeorg.extension'],
        'p' => ['text/x-pascal'],
        'p10' => ['application/pkcs10'],
        'p12' => ['application/pkcs12', 'application/x-pkcs12'],
        'p65' => ['application/x-pagemaker'],
        'p7b' => ['application/x-pkcs7-certificates'],
        'p7c' => ['application/pkcs7-mime'],
        'p7m' => ['application/pkcs7-mime'],
        'p7r' => ['application/x-pkcs7-certreqresp'],
        'p7s' => ['application/pkcs7-signature'],
        'p8' => ['application/pkcs8'],
        'p8e' => ['application/pkcs8-encrypted'],
        'pack' => ['application/x-java-pack200'],
        'pak' => ['application/x-pak'],
        'par2' => ['application/x-par2'],
        'part' => ['application/x-partial-download'],
        'pas' => ['text/x-pascal'],
        'pat' => ['image/x-gimp-pat'],
        'patch' => ['text/x-diff', 'text/x-patch'],
        'path' => ['text/x-systemd-unit'],
        'paw' => ['application/vnd.pawaafile'],
        'pbd' => ['application/vnd.powerbuilder6'],
        'pbm' => ['image/x-portable-bitmap'],
        'pcap' => ['application/pcap', 'application/vnd.tcpdump.pcap', 'application/x-pcap'],
        'pcd' => ['image/x-photo-cd'],
        'pce' => ['application/x-pc-engine-rom'],
        'pcf' => ['application/x-cisco-vpn-settings', 'application/x-font-pcf'],
        'pcf.Z' => ['application/x-font-pcf'],
        'pcf.gz' => ['application/x-font-pcf'],
        'pcl' => ['application/vnd.hp-pcl'],
        'pclxl' => ['application/vnd.hp-pclxl'],
        'pct' => ['image/x-pict'],
        'pcurl' => ['application/vnd.curl.pcurl'],
        'pcx' => ['image/vnd.zbrush.pcx', 'image/x-pcx'],
        'pdb' => ['application/vnd.palm', 'application/x-aportisdoc', 'application/x-palm-database'],
        'pdc' => ['application/x-aportisdoc'],
        'pdf' => ['application/pdf', 'application/acrobat', 'application/nappdf', 'application/x-pdf', 'image/pdf'],
        'pdf.bz2' => ['application/x-bzpdf'],
        'pdf.gz' => ['application/x-gzpdf'],
        'pdf.lz' => ['application/x-lzpdf'],
        'pdf.xz' => ['application/x-xzpdf'],
        'pef' => ['image/x-pentax-pef'],
        'pem' => ['application/x-x509-ca-cert'],
        'perl' => ['application/x-perl', 'text/x-perl'],
        'pfa' => ['application/x-font-type1'],
        'pfb' => ['application/x-font-type1'],
        'pfm' => ['application/x-font-type1'],
        'pfr' => ['application/font-tdpfr'],
        'pfx' => ['application/pkcs12', 'application/x-pkcs12'],
        'pgm' => ['image/x-portable-graymap'],
        'pgn' => ['application/vnd.chess-pgn', 'application/x-chess-pgn'],
        'pgp' => ['application/pgp', 'application/pgp-encrypted', 'application/pgp-keys', 'application/pgp-signature'],
        'php' => ['application/x-php'],
        'php3' => ['application/x-php'],
        'php4' => ['application/x-php'],
        'php5' => ['application/x-php'],
        'phps' => ['application/x-php'],
        'pic' => ['image/x-pict'],
        'pict' => ['image/x-pict'],
        'pict1' => ['image/x-pict'],
        'pict2' => ['image/x-pict'],
        'pk' => ['application/x-tex-pk'],
        'pkg' => ['application/octet-stream', 'application/x-xar'],
        'pki' => ['application/pkixcmp'],
        'pkipath' => ['application/pkix-pkipath'],
        'pkr' => ['application/pgp-keys'],
        'pl' => ['application/x-perl', 'text/x-perl'],
        'pla' => ['audio/x-iriver-pla'],
        'plb' => ['application/vnd.3gpp.pic-bw-large'],
        'plc' => ['application/vnd.mobius.plc'],
        'plf' => ['application/vnd.pocketlearn'],
        'pln' => ['application/x-planperfect'],
        'pls' => ['application/pls', 'application/pls+xml', 'audio/scpls', 'audio/x-scpls'],
        'pm' => ['application/x-pagemaker', 'application/x-perl', 'text/x-perl'],
        'pm6' => ['application/x-pagemaker'],
        'pmd' => ['application/x-pagemaker'],
        'pml' => ['application/vnd.ctc-posml'],
        'png' => ['image/png'],
        'pnm' => ['image/x-portable-anymap'],
        'pntg' => ['image/x-macpaint'],
        'po' => ['application/x-gettext', 'text/x-gettext-translation', 'text/x-po'],
        'pod' => ['application/x-perl', 'text/x-perl'],
        'por' => ['application/x-spss-por'],
        'portpkg' => ['application/vnd.macports.portpkg'],
        'pot' => ['application/mspowerpoint', 'application/powerpoint', 'application/vnd.ms-powerpoint', 'application/x-mspowerpoint', 'text/x-gettext-translation-template', 'text/x-pot'],
        'potm' => ['application/vnd.ms-powerpoint.template.macroenabled.12'],
        'potx' => ['application/vnd.openxmlformats-officedocument.presentationml.template'],
        'ppam' => ['application/vnd.ms-powerpoint.addin.macroenabled.12'],
        'ppd' => ['application/vnd.cups-ppd'],
        'ppm' => ['image/x-portable-pixmap'],
        'pps' => ['application/mspowerpoint', 'application/powerpoint', 'application/vnd.ms-powerpoint', 'application/x-mspowerpoint'],
        'ppsm' => ['application/vnd.ms-powerpoint.slideshow.macroenabled.12'],
        'ppsx' => ['application/vnd.openxmlformats-officedocument.presentationml.slideshow'],
        'ppt' => ['application/vnd.ms-powerpoint', 'application/mspowerpoint', 'application/powerpoint', 'application/x-mspowerpoint'],
        'pptm' => ['application/vnd.ms-powerpoint.presentation.macroenabled.12'],
        'pptx' => ['application/vnd.openxmlformats-officedocument.presentationml.presentation'],
        'ppz' => ['application/mspowerpoint', 'application/powerpoint', 'application/vnd.ms-powerpoint', 'application/x-mspowerpoint'],
        'pqa' => ['application/vnd.palm', 'application/x-palm-database'],
        'prc' => ['application/vnd.palm', 'application/x-mobipocket-ebook', 'application/x-palm-database'],
        'pre' => ['application/vnd.lotus-freelance'],
        'prf' => ['application/pics-rules'],
        'ps' => ['application/postscript'],
        'ps.bz2' => ['application/x-bzpostscript'],
        'ps.gz' => ['application/x-gzpostscript'],
        'psb' => ['application/vnd.3gpp.pic-bw-small'],
        'psd' => ['application/photoshop', 'application/x-photoshop', 'image/photoshop', 'image/psd', 'image/vnd.adobe.photoshop', 'image/x-photoshop', 'image/x-psd'],
        'psf' => ['application/x-font-linux-psf', 'audio/x-psf'],
        'psf.gz' => ['application/x-gz-font-linux-psf'],
        'psflib' => ['audio/x-psflib'],
        'psid' => ['audio/prs.sid'],
        'pskcxml' => ['application/pskc+xml'],
        'psw' => ['application/x-pocket-word'],
        'ptid' => ['application/vnd.pvi.ptid1'],
        'pub' => ['application/vnd.ms-publisher', 'application/x-mspublisher'],
        'pvb' => ['application/vnd.3gpp.pic-bw-var'],
        'pw' => ['application/x-pw'],
        'pwn' => ['application/vnd.3m.post-it-notes'],
        'py' => ['text/x-python', 'text/x-python3'],
        'py3' => ['text/x-python3'],
        'py3x' => ['text/x-python3'],
        'pya' => ['audio/vnd.ms-playready.media.pya'],
        'pyc' => ['application/x-python-bytecode'],
        'pyo' => ['application/x-python-bytecode'],
        'pyv' => ['video/vnd.ms-playready.media.pyv'],
        'pyx' => ['text/x-python'],
        'qam' => ['application/vnd.epson.quickanime'],
        'qbo' => ['application/vnd.intu.qbo'],
        'qd' => ['application/x-fd-file', 'application/x-raw-floppy-disk-image'],
        'qfx' => ['application/vnd.intu.qfx'],
        'qif' => ['application/x-qw', 'image/x-quicktime'],
        'qml' => ['text/x-qml'],
        'qmlproject' => ['text/x-qml'],
        'qmltypes' => ['text/x-qml'],
        'qp' => ['application/x-qpress'],
        'qps' => ['application/vnd.publishare-delta-tree'],
        'qt' => ['video/quicktime'],
        'qti' => ['application/x-qtiplot'],
        'qti.gz' => ['application/x-qtiplot'],
        'qtif' => ['image/x-quicktime'],
        'qtl' => ['application/x-quicktime-media-link', 'application/x-quicktimeplayer'],
        'qtvr' => ['video/quicktime'],
        'qwd' => ['application/vnd.quark.quarkxpress'],
        'qwt' => ['application/vnd.quark.quarkxpress'],
        'qxb' => ['application/vnd.quark.quarkxpress'],
        'qxd' => ['application/vnd.quark.quarkxpress'],
        'qxl' => ['application/vnd.quark.quarkxpress'],
        'qxt' => ['application/vnd.quark.quarkxpress'],
        'ra' => ['audio/vnd.m-realaudio', 'audio/vnd.rn-realaudio', 'audio/x-pn-realaudio'],
        'raf' => ['image/x-fuji-raf'],
        'ram' => ['application/ram', 'audio/x-pn-realaudio'],
        'raml' => ['application/raml+yaml'],
        'rar' => ['application/x-rar-compressed', 'application/vnd.rar', 'application/x-rar'],
        'ras' => ['image/x-cmu-raster'],
        'raw' => ['image/x-panasonic-raw', 'image/x-panasonic-rw'],
        'raw-disk-image' => ['application/x-raw-disk-image'],
        'raw-disk-image.xz' => ['application/x-raw-disk-image-xz-compressed'],
        'rax' => ['audio/vnd.m-realaudio', 'audio/vnd.rn-realaudio', 'audio/x-pn-realaudio'],
        'rb' => ['application/x-ruby'],
        'rcprofile' => ['application/vnd.ipunplugged.rcprofile'],
        'rdf' => ['application/rdf+xml', 'text/rdf'],
        'rdfs' => ['application/rdf+xml', 'text/rdf'],
        'rdz' => ['application/vnd.data-vision.rdz'],
        'reg' => ['text/x-ms-regedit'],
        'rej' => ['application/x-reject', 'text/x-reject'],
        'rep' => ['application/vnd.businessobjects'],
        'res' => ['application/x-dtbresource+xml'],
        'rgb' => ['image/x-rgb'],
        'rif' => ['application/reginfo+xml'],
        'rip' => ['audio/vnd.rip'],
        'ris' => ['application/x-research-info-systems'],
        'rl' => ['application/resource-lists+xml'],
        'rlc' => ['image/vnd.fujixerox.edmics-rlc'],
        'rld' => ['application/resource-lists-diff+xml'],
        'rle' => ['image/rle'],
        'rm' => ['application/vnd.rn-realmedia', 'application/vnd.rn-realmedia-vbr'],
        'rmi' => ['audio/midi'],
        'rmj' => ['application/vnd.rn-realmedia', 'application/vnd.rn-realmedia-vbr'],
        'rmm' => ['application/vnd.rn-realmedia', 'application/vnd.rn-realmedia-vbr'],
        'rmp' => ['audio/x-pn-realaudio-plugin'],
        'rms' => ['application/vnd.jcp.javame.midlet-rms', 'application/vnd.rn-realmedia', 'application/vnd.rn-realmedia-vbr'],
        'rmvb' => ['application/vnd.rn-realmedia', 'application/vnd.rn-realmedia-vbr'],
        'rmx' => ['application/vnd.rn-realmedia', 'application/vnd.rn-realmedia-vbr'],
        'rnc' => ['application/relax-ng-compact-syntax', 'application/x-rnc'],
        'rng' => ['application/xml', 'text/xml'],
        'roa' => ['application/rpki-roa'],
        'roff' => ['application/x-troff', 'text/troff', 'text/x-troff'],
        'rp' => ['image/vnd.rn-realpix'],
        'rp9' => ['application/vnd.cloanto.rp9'],
        'rpm' => ['application/x-redhat-package-manager', 'application/x-rpm'],
        'rpss' => ['application/vnd.nokia.radio-presets'],
        'rpst' => ['application/vnd.nokia.radio-preset'],
        'rq' => ['application/sparql-query'],
        'rs' => ['application/rls-services+xml', 'text/rust'],
        'rsd' => ['application/rsd+xml'],
        'rss' => ['application/rss+xml', 'text/rss'],
        'rt' => ['text/vnd.rn-realtext'],
        'rtf' => ['application/rtf', 'text/rtf'],
        'rtx' => ['text/richtext'],
        'rv' => ['video/vnd.rn-realvideo', 'video/x-real-video'],
        'rvx' => ['video/vnd.rn-realvideo', 'video/x-real-video'],
        'rw2' => ['image/x-panasonic-raw2', 'image/x-panasonic-rw2'],
        's' => ['text/x-asm'],
        's3m' => ['audio/s3m', 'audio/x-s3m'],
        'saf' => ['application/vnd.yamaha.smaf-audio'],
        'sam' => ['application/x-amipro'],
        'sami' => ['application/x-sami'],
        'sap' => ['application/x-sap-file', 'application/x-thomson-sap-image'],
        'sass' => ['text/x-sass'],
        'sav' => ['application/x-spss-sav', 'application/x-spss-savefile'],
        'sbml' => ['application/sbml+xml'],
        'sc' => ['application/vnd.ibm.secure-container'],
        'scala' => ['text/x-scala'],
        'scd' => ['application/x-msschedule'],
        'scm' => ['application/vnd.lotus-screencam', 'text/x-scheme'],
        'scope' => ['text/x-systemd-unit'],
        'scq' => ['application/scvp-cv-request'],
        'scs' => ['application/scvp-cv-response'],
        'scss' => ['text/x-scss'],
        'scurl' => ['text/vnd.curl.scurl'],
        'sda' => ['application/vnd.stardivision.draw'],
        'sdc' => ['application/vnd.stardivision.calc'],
        'sdd' => ['application/vnd.stardivision.impress'],
        'sdkd' => ['application/vnd.solent.sdkm+xml'],
        'sdkm' => ['application/vnd.solent.sdkm+xml'],
        'sdp' => ['application/sdp', 'application/vnd.sdp', 'application/vnd.stardivision.impress', 'application/x-sdp'],
        'sds' => ['application/vnd.stardivision.chart'],
        'sdw' => ['application/vnd.stardivision.writer', 'application/vnd.stardivision.writer-global'],
        'see' => ['application/vnd.seemail'],
        'seed' => ['application/vnd.fdsn.seed'],
        'sema' => ['application/vnd.sema'],
        'semd' => ['application/vnd.semd'],
        'semf' => ['application/vnd.semf'],
        'ser' => ['application/java-serialized-object'],
        'service' => ['text/x-dbus-service', 'text/x-systemd-unit'],
        'setpay' => ['application/set-payment-initiation'],
        'setreg' => ['application/set-registration-initiation'],
        'sfc' => ['application/vnd.nintendo.snes.rom', 'application/x-snes-rom'],
        'sfd-hdstx' => ['application/vnd.hydrostatix.sof-data'],
        'sfs' => ['application/vnd.spotfire.sfs'],
        'sfv' => ['text/x-sfv'],
        'sg' => ['application/x-sg1000-rom'],
        'sgb' => ['application/x-gameboy-rom'],
        'sgf' => ['application/x-go-sgf'],
        'sgi' => ['image/sgi', 'image/x-sgi'],
        'sgl' => ['application/vnd.stardivision.writer', 'application/vnd.stardivision.writer-global'],
        'sgm' => ['text/sgml'],
        'sgml' => ['text/sgml'],
        'sh' => ['application/x-sh', 'application/x-shellscript', 'text/x-sh'],
        'shape' => ['application/x-dia-shape'],
        'shar' => ['application/x-shar'],
        'shf' => ['application/shf+xml'],
        'shn' => ['application/x-shorten', 'audio/x-shorten'],
        'siag' => ['application/x-siag'],
        'sid' => ['audio/prs.sid', 'image/x-mrsid-image'],
        'sig' => ['application/pgp-signature'],
        'sik' => ['application/x-trash'],
        'sil' => ['audio/silk'],
        'silo' => ['model/mesh'],
        'sis' => ['application/vnd.symbian.install'],
        'sisx' => ['application/vnd.symbian.install', 'x-epoc/x-sisx-app'],
        'sit' => ['application/x-stuffit', 'application/stuffit', 'application/x-sit'],
        'sitx' => ['application/x-stuffitx'],
        'siv' => ['application/sieve'],
        'sk' => ['image/x-skencil'],
        'sk1' => ['image/x-skencil'],
        'skd' => ['application/vnd.koan'],
        'skm' => ['application/vnd.koan'],
        'skp' => ['application/vnd.koan'],
        'skr' => ['application/pgp-keys'],
        'skt' => ['application/vnd.koan'],
        'sldm' => ['application/vnd.ms-powerpoint.slide.macroenabled.12'],
        'sldx' => ['application/vnd.openxmlformats-officedocument.presentationml.slide'],
        'slice' => ['text/x-systemd-unit'],
        'slk' => ['text/spreadsheet'],
        'slt' => ['application/vnd.epson.salt'],
        'sm' => ['application/vnd.stepmania.stepchart'],
        'smaf' => ['application/vnd.smaf', 'application/x-smaf'],
        'smc' => ['application/vnd.nintendo.snes.rom', 'application/x-snes-rom'],
        'smd' => ['application/vnd.stardivision.mail', 'application/x-genesis-rom'],
        'smf' => ['application/vnd.stardivision.math'],
        'smi' => ['application/smil', 'application/smil+xml', 'application/x-sami'],
        'smil' => ['application/smil', 'application/smil+xml'],
        'sml' => ['application/smil', 'application/smil+xml'],
        'sms' => ['application/x-sms-rom'],
        'smv' => ['video/x-smv'],
        'smzip' => ['application/vnd.stepmania.package'],
        'snap' => ['application/vnd.snap'],
        'snd' => ['audio/basic'],
        'snf' => ['application/x-font-snf'],
        'so' => ['application/octet-stream', 'application/x-sharedlib'],
        'socket' => ['text/x-systemd-unit'],
        'spc' => ['application/x-pkcs7-certificates'],
        'spd' => ['application/x-font-speedo'],
        'spec' => ['text/x-rpm-spec'],
        'spf' => ['application/vnd.yamaha.smaf-phrase'],
        'spl' => ['application/futuresplash', 'application/vnd.adobe.flash.movie', 'application/x-futuresplash', 'application/x-shockwave-flash'],
        'spm' => ['application/x-source-rpm'],
        'spot' => ['text/vnd.in3d.spot'],
        'spp' => ['application/scvp-vp-response'],
        'spq' => ['application/scvp-vp-request'],
        'spx' => ['audio/ogg', 'audio/x-speex'],
        'sql' => ['application/sql', 'application/x-sql', 'text/x-sql'],
        'sqlite2' => ['application/x-sqlite2'],
        'sqlite3' => ['application/vnd.sqlite3', 'application/x-sqlite3'],
        'sqsh' => ['application/vnd.squashfs'],
        'sr2' => ['image/x-sony-sr2'],
        'src' => ['application/x-wais-source'],
        'src.rpm' => ['application/x-source-rpm'],
        'srf' => ['image/x-sony-srf'],
        'srt' => ['application/x-srt', 'application/x-subrip'],
        'sru' => ['application/sru+xml'],
        'srx' => ['application/sparql-results+xml'],
        'ss' => ['text/x-scheme'],
        'ssa' => ['text/x-ssa'],
        'ssdl' => ['application/ssdl+xml'],
        'sse' => ['application/vnd.kodak-descriptor'],
        'ssf' => ['application/vnd.epson.ssf'],
        'ssml' => ['application/ssml+xml'],
        'st' => ['application/vnd.sailingtracker.track'],
        'stc' => ['application/vnd.sun.xml.calc.template'],
        'std' => ['application/vnd.sun.xml.draw.template'],
        'stf' => ['application/vnd.wt.stf'],
        'sti' => ['application/vnd.sun.xml.impress.template'],
        'stk' => ['application/hyperstudio'],
        'stl' => ['application/vnd.ms-pki.stl', 'model/stl', 'model/x.stl-ascii', 'model/x.stl-binary'],
        'stm' => ['audio/x-stm'],
        'str' => ['application/vnd.pg.format'],
        'stw' => ['application/vnd.sun.xml.writer.template'],
        'sty' => ['application/x-tex', 'text/x-tex'],
        'sub' => ['image/vnd.dvb.subtitle', 'text/vnd.dvb.subtitle', 'text/x-microdvd', 'text/x-mpsub', 'text/x-subviewer'],
        'sun' => ['image/x-sun-raster'],
        'sus' => ['application/vnd.sus-calendar'],
        'susp' => ['application/vnd.sus-calendar'],
        'sv' => ['text/x-svsrc'],
        'sv4cpio' => ['application/x-sv4cpio'],
        'sv4crc' => ['application/x-sv4crc'],
        'svc' => ['application/vnd.dvb.service'],
        'svd' => ['application/vnd.svd'],
        'svg' => ['image/svg+xml', 'image/svg'],
        'svgz' => ['image/svg+xml', 'image/svg+xml-compressed'],
        'svh' => ['text/x-svhdr'],
        'swa' => ['application/x-director'],
        'swap' => ['text/x-systemd-unit'],
        'swf' => ['application/futuresplash', 'application/vnd.adobe.flash.movie', 'application/x-shockwave-flash'],
        'swi' => ['application/vnd.aristanetworks.swi'],
        'swm' => ['application/x-ms-wim'],
        'sxc' => ['application/vnd.sun.xml.calc'],
        'sxd' => ['application/vnd.sun.xml.draw'],
        'sxg' => ['application/vnd.sun.xml.writer.global'],
        'sxi' => ['application/vnd.sun.xml.impress'],
        'sxm' => ['application/vnd.sun.xml.math'],
        'sxw' => ['application/vnd.sun.xml.writer'],
        'sylk' => ['text/spreadsheet'],
        't' => ['application/x-perl', 'application/x-troff', 'text/troff', 'text/x-perl', 'text/x-troff'],
        't2t' => ['text/x-txt2tags'],
        't3' => ['application/x-t3vm-image'],
        'taglet' => ['application/vnd.mynfc'],
        'tao' => ['application/vnd.tao.intent-module-archive'],
        'tar' => ['application/x-tar', 'application/x-gtar'],
        'tar.Z' => ['application/x-tarz'],
        'tar.bz' => ['application/x-bzip-compressed-tar'],
        'tar.bz2' => ['application/x-bzip-compressed-tar'],
        'tar.gz' => ['application/x-compressed-tar'],
        'tar.lrz' => ['application/x-lrzip-compressed-tar'],
        'tar.lz' => ['application/x-lzip-compressed-tar'],
        'tar.lz4' => ['application/x-lz4-compressed-tar'],
        'tar.lzma' => ['application/x-lzma-compressed-tar'],
        'tar.lzo' => ['application/x-tzo'],
        'tar.xz' => ['application/x-xz-compressed-tar'],
        'target' => ['text/x-systemd-unit'],
        'taz' => ['application/x-tarz'],
        'tb2' => ['application/x-bzip-compressed-tar'],
        'tbz' => ['application/x-bzip-compressed-tar'],
        'tbz2' => ['application/x-bzip-compressed-tar'],
        'tcap' => ['application/vnd.3gpp2.tcap'],
        'tcl' => ['application/x-tcl', 'text/x-tcl'],
        'teacher' => ['application/vnd.smart.teacher'],
        'tei' => ['application/tei+xml'],
        'teicorpus' => ['application/tei+xml'],
        'tex' => ['application/x-tex', 'text/x-tex'],
        'texi' => ['application/x-texinfo', 'text/x-texinfo'],
        'texinfo' => ['application/x-texinfo', 'text/x-texinfo'],
        'text' => ['text/plain'],
        'tfi' => ['application/thraud+xml'],
        'tfm' => ['application/x-tex-tfm'],
        'tga' => ['image/x-icb', 'image/x-tga'],
        'tgz' => ['application/x-compressed-tar'],
        'theme' => ['application/x-theme'],
        'themepack' => ['application/x-windows-themepack'],
        'thmx' => ['application/vnd.ms-officetheme'],
        'tif' => ['image/tiff'],
        'tiff' => ['image/tiff'],
        'timer' => ['text/x-systemd-unit'],
        'tk' => ['text/x-tcl'],
        'tlrz' => ['application/x-lrzip-compressed-tar'],
        'tlz' => ['application/x-lzma-compressed-tar'],
        'tmo' => ['application/vnd.tmobile-livetv'],
        'tnef' => ['application/ms-tnef', 'application/vnd.ms-tnef'],
        'tnf' => ['application/ms-tnef', 'application/vnd.ms-tnef'],
        'toc' => ['application/x-cdrdao-toc'],
        'torrent' => ['application/x-bittorrent'],
        'tpic' => ['image/x-icb', 'image/x-tga'],
        'tpl' => ['application/vnd.groove-tool-template'],
        'tpt' => ['application/vnd.trid.tpt'],
        'tr' => ['application/x-troff', 'text/troff', 'text/x-troff'],
        'tra' => ['application/vnd.trueapp'],
        'trig' => ['application/trig', 'application/x-trig'],
        'trm' => ['application/x-msterminal'],
        'ts' => ['application/x-linguist', 'text/vnd.qt.linguist', 'text/vnd.trolltech.linguist', 'video/mp2t'],
        'tsd' => ['application/timestamped-data'],
        'tsv' => ['text/tab-separated-values'],
        'tta' => ['audio/tta', 'audio/x-tta'],
        'ttc' => ['font/collection'],
        'ttf' => ['application/x-font-truetype', 'application/x-font-ttf', 'font/ttf'],
        'ttl' => ['text/turtle'],
        'ttx' => ['application/x-font-ttx'],
        'twd' => ['application/vnd.simtech-mindmapper'],
        'twds' => ['application/vnd.simtech-mindmapper'],
        'twig' => ['text/x-twig'],
        'txd' => ['application/vnd.genomatix.tuxedo'],
        'txf' => ['application/vnd.mobius.txf'],
        'txt' => ['text/plain'],
        'txz' => ['application/x-xz-compressed-tar'],
        'tzo' => ['application/x-tzo'],
        'u32' => ['application/x-authorware-bin'],
        'udeb' => ['application/vnd.debian.binary-package', 'application/x-deb', 'application/x-debian-package'],
        'ufd' => ['application/vnd.ufdl'],
        'ufdl' => ['application/vnd.ufdl'],
        'ufraw' => ['application/x-ufraw'],
        'ui' => ['application/x-designer', 'application/x-gtk-builder'],
        'uil' => ['text/x-uil'],
        'ult' => ['audio/x-mod'],
        'ulx' => ['application/x-glulx'],
        'umj' => ['application/vnd.umajin'],
        'unf' => ['application/x-nes-rom'],
        'uni' => ['audio/x-mod'],
        'unif' => ['application/x-nes-rom'],
        'unityweb' => ['application/vnd.unity'],
        'uoml' => ['application/vnd.uoml+xml'],
        'uri' => ['text/uri-list'],
        'uris' => ['text/uri-list'],
        'url' => ['application/x-mswinurl'],
        'urls' => ['text/uri-list'],
        'ustar' => ['application/x-ustar'],
        'utz' => ['application/vnd.uiq.theme'],
        'uu' => ['text/x-uuencode'],
        'uue' => ['text/x-uuencode', 'zz-application/zz-winassoc-uu'],
        'uva' => ['audio/vnd.dece.audio'],
        'uvd' => ['application/vnd.dece.data'],
        'uvf' => ['application/vnd.dece.data'],
        'uvg' => ['image/vnd.dece.graphic'],
        'uvh' => ['video/vnd.dece.hd'],
        'uvi' => ['image/vnd.dece.graphic'],
        'uvm' => ['video/vnd.dece.mobile'],
        'uvp' => ['video/vnd.dece.pd'],
        'uvs' => ['video/vnd.dece.sd'],
        'uvt' => ['application/vnd.dece.ttml+xml'],
        'uvu' => ['video/vnd.uvvu.mp4'],
        'uvv' => ['video/vnd.dece.video'],
        'uvva' => ['audio/vnd.dece.audio'],
        'uvvd' => ['application/vnd.dece.data'],
        'uvvf' => ['application/vnd.dece.data'],
        'uvvg' => ['image/vnd.dece.graphic'],
        'uvvh' => ['video/vnd.dece.hd'],
        'uvvi' => ['image/vnd.dece.graphic'],
        'uvvm' => ['video/vnd.dece.mobile'],
        'uvvp' => ['video/vnd.dece.pd'],
        'uvvs' => ['video/vnd.dece.sd'],
        'uvvt' => ['application/vnd.dece.ttml+xml'],
        'uvvu' => ['video/vnd.uvvu.mp4'],
        'uvvv' => ['video/vnd.dece.video'],
        'uvvx' => ['application/vnd.dece.unspecified'],
        'uvvz' => ['application/vnd.dece.zip'],
        'uvx' => ['application/vnd.dece.unspecified'],
        'uvz' => ['application/vnd.dece.zip'],
        'v' => ['text/x-verilog'],
        'v64' => ['application/x-n64-rom'],
        'vala' => ['text/x-vala'],
        'vapi' => ['text/x-vala'],
        'vb' => ['application/x-virtual-boy-rom'],
        'vcard' => ['text/directory', 'text/vcard', 'text/x-vcard'],
        'vcd' => ['application/x-cdlink'],
        'vcf' => ['text/x-vcard', 'text/directory', 'text/vcard'],
        'vcg' => ['application/vnd.groove-vcard'],
        'vcs' => ['application/ics', 'text/calendar', 'text/x-vcalendar'],
        'vct' => ['text/directory', 'text/vcard', 'text/x-vcard'],
        'vcx' => ['application/vnd.vcx'],
        'vda' => ['image/x-icb', 'image/x-tga'],
        'vhd' => ['text/x-vhdl'],
        'vhdl' => ['text/x-vhdl'],
        'vis' => ['application/vnd.visionary'],
        'viv' => ['video/vivo', 'video/vnd.vivo'],
        'vivo' => ['video/vivo', 'video/vnd.vivo'],
        'vlc' => ['application/m3u', 'audio/m3u', 'audio/mpegurl', 'audio/x-m3u', 'audio/x-mp3-playlist', 'audio/x-mpegurl'],
        'vob' => ['video/mpeg', 'video/mpeg-system', 'video/x-mpeg', 'video/x-mpeg-system', 'video/x-mpeg2', 'video/x-ms-vob'],
        'voc' => ['audio/x-voc'],
        'vor' => ['application/vnd.stardivision.writer', 'application/vnd.stardivision.writer-global'],
        'vox' => ['application/x-authorware-bin'],
        'vrm' => ['model/vrml'],
        'vrml' => ['model/vrml'],
        'vsd' => ['application/vnd.visio'],
        'vsdm' => ['application/vnd.ms-visio.drawing.macroenabled.main+xml'],
        'vsdx' => ['application/vnd.ms-visio.drawing.main+xml'],
        'vsf' => ['application/vnd.vsf'],
        'vss' => ['application/vnd.visio'],
        'vssm' => ['application/vnd.ms-visio.stencil.macroenabled.main+xml'],
        'vssx' => ['application/vnd.ms-visio.stencil.main+xml'],
        'vst' => ['application/vnd.visio', 'image/x-icb', 'image/x-tga'],
        'vstm' => ['application/vnd.ms-visio.template.macroenabled.main+xml'],
        'vstx' => ['application/vnd.ms-visio.template.main+xml'],
        'vsw' => ['application/vnd.visio'],
        'vtt' => ['text/vtt'],
        'vtu' => ['model/vnd.vtu'],
        'vxml' => ['application/voicexml+xml'],
        'w3d' => ['application/x-director'],
        'wad' => ['application/x-doom', 'application/x-doom-wad', 'application/x-wii-wad'],
        'wav' => ['audio/wav', 'audio/vnd.wave', 'audio/x-wav'],
        'wax' => ['application/x-ms-asx', 'audio/x-ms-asx', 'audio/x-ms-wax', 'video/x-ms-wax', 'video/x-ms-wmx', 'video/x-ms-wvx'],
        'wb1' => ['application/x-quattropro'],
        'wb2' => ['application/x-quattropro'],
        'wb3' => ['application/x-quattropro'],
        'wbmp' => ['image/vnd.wap.wbmp'],
        'wbs' => ['application/vnd.criticaltools.wbs+xml'],
        'wbxml' => ['application/vnd.wap.wbxml'],
        'wcm' => ['application/vnd.ms-works'],
        'wdb' => ['application/vnd.ms-works'],
        'wdp' => ['image/vnd.ms-photo'],
        'weba' => ['audio/webm'],
        'webm' => ['video/webm'],
        'webp' => ['image/webp'],
        'wg' => ['application/vnd.pmi.widget'],
        'wgt' => ['application/widget'],
        'wim' => ['application/x-ms-wim'],
        'wk1' => ['application/lotus123', 'application/vnd.lotus-1-2-3', 'application/wk1', 'application/x-123', 'application/x-lotus123', 'zz-application/zz-winassoc-123'],
        'wk3' => ['application/lotus123', 'application/vnd.lotus-1-2-3', 'application/wk1', 'application/x-123', 'application/x-lotus123', 'zz-application/zz-winassoc-123'],
        'wk4' => ['application/lotus123', 'application/vnd.lotus-1-2-3', 'application/wk1', 'application/x-123', 'application/x-lotus123', 'zz-application/zz-winassoc-123'],
        'wkdownload' => ['application/x-partial-download'],
        'wks' => ['application/lotus123', 'application/vnd.lotus-1-2-3', 'application/vnd.ms-works', 'application/wk1', 'application/x-123', 'application/x-lotus123', 'zz-application/zz-winassoc-123'],
        'wm' => ['video/x-ms-wm'],
        'wma' => ['audio/x-ms-wma', 'audio/wma'],
        'wmd' => ['application/x-ms-wmd'],
        'wmf' => ['application/wmf', 'application/x-msmetafile', 'application/x-wmf', 'image/wmf', 'image/x-win-metafile', 'image/x-wmf'],
        'wml' => ['text/vnd.wap.wml'],
        'wmlc' => ['application/vnd.wap.wmlc'],
        'wmls' => ['text/vnd.wap.wmlscript'],
        'wmlsc' => ['application/vnd.wap.wmlscriptc'],
        'wmv' => ['audio/x-ms-wmv', 'video/x-ms-wmv'],
        'wmx' => ['application/x-ms-asx', 'audio/x-ms-asx', 'video/x-ms-wax', 'video/x-ms-wmx', 'video/x-ms-wvx'],
        'wmz' => ['application/x-ms-wmz', 'application/x-msmetafile'],
        'woff' => ['application/font-woff', 'application/x-font-woff', 'font/woff'],
        'woff2' => ['font/woff', 'font/woff2'],
        'wp' => ['application/vnd.wordperfect', 'application/wordperfect', 'application/x-wordperfect'],
        'wp4' => ['application/vnd.wordperfect', 'application/wordperfect', 'application/x-wordperfect'],
        'wp5' => ['application/vnd.wordperfect', 'application/wordperfect', 'application/x-wordperfect'],
        'wp6' => ['application/vnd.wordperfect', 'application/wordperfect', 'application/x-wordperfect'],
        'wpd' => ['application/vnd.wordperfect', 'application/wordperfect', 'application/x-wordperfect'],
        'wpg' => ['application/x-wpg'],
        'wpl' => ['application/vnd.ms-wpl'],
        'wpp' => ['application/vnd.wordperfect', 'application/wordperfect', 'application/x-wordperfect'],
        'wps' => ['application/vnd.ms-works'],
        'wqd' => ['application/vnd.wqd'],
        'wri' => ['application/x-mswrite'],
        'wrl' => ['model/vrml'],
        'ws' => ['application/x-wonderswan-rom'],
        'wsc' => ['application/x-wonderswan-color-rom'],
        'wsdl' => ['application/wsdl+xml'],
        'wsgi' => ['text/x-python'],
        'wspolicy' => ['application/wspolicy+xml'],
        'wtb' => ['application/vnd.webturbo'],
        'wv' => ['audio/x-wavpack'],
        'wvc' => ['audio/x-wavpack-correction'],
        'wvp' => ['audio/x-wavpack'],
        'wvx' => ['application/x-ms-asx', 'audio/x-ms-asx', 'video/x-ms-wax', 'video/x-ms-wmx', 'video/x-ms-wvx'],
        'wwf' => ['application/wwf', 'application/x-wwf'],
        'x32' => ['application/x-authorware-bin'],
        'x3d' => ['model/x3d+xml'],
        'x3db' => ['model/x3d+binary'],
        'x3dbz' => ['model/x3d+binary'],
        'x3dv' => ['model/x3d+vrml'],
        'x3dvz' => ['model/x3d+vrml'],
        'x3dz' => ['model/x3d+xml'],
        'x3f' => ['image/x-sigma-x3f'],
        'xac' => ['application/x-gnucash'],
        'xaml' => ['application/xaml+xml'],
        'xap' => ['application/x-silverlight-app'],
        'xar' => ['application/vnd.xara', 'application/x-xar'],
        'xbap' => ['application/x-ms-xbap'],
        'xbd' => ['application/vnd.fujixerox.docuworks.binder'],
        'xbel' => ['application/x-xbel'],
        'xbl' => ['application/xml', 'text/xml'],
        'xbm' => ['image/x-xbitmap'],
        'xcf' => ['image/x-xcf'],
        'xcf.bz2' => ['image/x-compressed-xcf'],
        'xcf.gz' => ['image/x-compressed-xcf'],
        'xdf' => ['application/xcap-diff+xml'],
        'xdgapp' => ['application/vnd.flatpak', 'application/vnd.xdgapp'],
        'xdm' => ['application/vnd.syncml.dm+xml'],
        'xdp' => ['application/vnd.adobe.xdp+xml'],
        'xdssc' => ['application/dssc+xml'],
        'xdw' => ['application/vnd.fujixerox.docuworks'],
        'xenc' => ['application/xenc+xml'],
        'xer' => ['application/patch-ops-error+xml'],
        'xfdf' => ['application/vnd.adobe.xfdf'],
        'xfdl' => ['application/vnd.xfdl'],
        'xhe' => ['audio/usac'],
        'xht' => ['application/xhtml+xml'],
        'xhtml' => ['application/xhtml+xml'],
        'xhvml' => ['application/xv+xml'],
        'xi' => ['audio/x-xi'],
        'xif' => ['image/vnd.xiff'],
        'xla' => ['application/msexcel', 'application/vnd.ms-excel', 'application/x-msexcel', 'zz-application/zz-winassoc-xls'],
        'xlam' => ['application/vnd.ms-excel.addin.macroenabled.12'],
        'xlc' => ['application/msexcel', 'application/vnd.ms-excel', 'application/x-msexcel', 'zz-application/zz-winassoc-xls'],
        'xld' => ['application/msexcel', 'application/vnd.ms-excel', 'application/x-msexcel', 'zz-application/zz-winassoc-xls'],
        'xlf' => ['application/x-xliff', 'application/x-xliff+xml', 'application/xliff+xml'],
        'xliff' => ['application/x-xliff', 'application/xliff+xml'],
        'xll' => ['application/msexcel', 'application/vnd.ms-excel', 'application/x-msexcel', 'zz-application/zz-winassoc-xls'],
        'xlm' => ['application/msexcel', 'application/vnd.ms-excel', 'application/x-msexcel', 'zz-application/zz-winassoc-xls'],
        'xlr' => ['application/vnd.ms-works'],
        'xls' => ['application/vnd.ms-excel', 'application/msexcel', 'application/x-msexcel', 'zz-application/zz-winassoc-xls'],
        'xlsb' => ['application/vnd.ms-excel.sheet.binary.macroenabled.12'],
        'xlsm' => ['application/vnd.ms-excel.sheet.macroenabled.12'],
        'xlsx' => ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'],
        'xlt' => ['application/msexcel', 'application/vnd.ms-excel', 'application/x-msexcel', 'zz-application/zz-winassoc-xls'],
        'xltm' => ['application/vnd.ms-excel.template.macroenabled.12'],
        'xltx' => ['application/vnd.openxmlformats-officedocument.spreadsheetml.template'],
        'xlw' => ['application/msexcel', 'application/vnd.ms-excel', 'application/x-msexcel', 'zz-application/zz-winassoc-xls'],
        'xm' => ['audio/x-xm', 'audio/xm'],
        'xmf' => ['audio/mobile-xmf', 'audio/x-xmf', 'audio/xmf'],
        'xmi' => ['text/x-xmi'],
        'xml' => ['application/xml', 'text/xml'],
        'xo' => ['application/vnd.olpc-sugar'],
        'xop' => ['application/xop+xml'],
        'xpi' => ['application/x-xpinstall'],
        'xpl' => ['application/xproc+xml'],
        'xpm' => ['image/x-xpixmap', 'image/x-xpm'],
        'xpr' => ['application/vnd.is-xpr'],
        'xps' => ['application/oxps', 'application/vnd.ms-xpsdocument', 'application/xps'],
        'xpw' => ['application/vnd.intercon.formnet'],
        'xpx' => ['application/vnd.intercon.formnet'],
        'xsd' => ['application/xml', 'text/xml'],
        'xsl' => ['application/xml', 'application/xslt+xml'],
        'xslfo' => ['text/x-xslfo'],
        'xslt' => ['application/xslt+xml'],
        'xsm' => ['application/vnd.syncml+xml'],
        'xspf' => ['application/x-xspf+xml', 'application/xspf+xml'],
        'xul' => ['application/vnd.mozilla.xul+xml'],
        'xvm' => ['application/xv+xml'],
        'xvml' => ['application/xv+xml'],
        'xwd' => ['image/x-xwindowdump'],
        'xyz' => ['chemical/x-xyz'],
        'xz' => ['application/x-xz'],
        'yaml' => ['application/x-yaml', 'text/x-yaml', 'text/yaml'],
        'yang' => ['application/yang'],
        'yin' => ['application/yin+xml'],
        'yml' => ['application/x-yaml', 'text/x-yaml', 'text/yaml'],
        'yt' => ['application/vnd.youtube.yt'],
        'z1' => ['application/x-zmachine'],
        'z2' => ['application/x-zmachine'],
        'z3' => ['application/x-zmachine'],
        'z4' => ['application/x-zmachine'],
        'z5' => ['application/x-zmachine'],
        'z6' => ['application/x-zmachine'],
        'z64' => ['application/x-n64-rom'],
        'z7' => ['application/x-zmachine'],
        'z8' => ['application/x-zmachine'],
        'zabw' => ['application/x-abiword'],
        'zaz' => ['application/vnd.zzazz.deck+xml'],
        'zip' => ['application/zip', 'application/x-zip', 'application/x-zip-compressed'],
        'zir' => ['application/vnd.zul'],
        'zirz' => ['application/vnd.zul'],
        'zmm' => ['application/vnd.handheld-entertainment+xml'],
        'zoo' => ['application/x-zoo'],
        'zsav' => ['application/x-spss-sav', 'application/x-spss-savefile'],
        'zz' => ['application/zlib'],
        '123' => ['application/lotus123', 'application/vnd.lotus-1-2-3', 'application/wk1', 'application/x-123', 'application/x-lotus123', 'zz-application/zz-winassoc-123'],
        '602' => ['application/x-t602'],
        '669' => ['audio/x-mod'],
    ];
}
