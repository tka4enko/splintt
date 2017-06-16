<?php

/* twig/footer.twig */
class __TwigTemplate_2634669d96c5e24c06f6f1ba3612371e5c1225c09f52cbd1ab8e56da75d95506 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<section class=\"section-before-footer ";
        echo ($context["class"] ?? null);
        echo "\">
    <div class=\"pattern-bg\"></div>
    <div class=\"inner\">
        <div class=\"bgimg ";
        // line 4
        echo ($context["bgimageclass"] ?? null);
        echo "\" style=\"background-image:url('";
        echo ($context["before_footer_image_url"] ?? null);
        echo "')\"></div>
        <div class=\"content-wrapper\">
            ";
        // line 6
        echo ($context["before_footer_content"] ?? null);
        echo "
        </div>
    </div>
     <div class=\"social-icons text-center mb70 show_on_landingpage \">
        <ul class=\"social-icons-ul social-style1\">
            <span class=\"volg-text\">";
        // line 11
        echo ($context["deel_deze"] ?? null);
        echo "</span>
            <li><a id=\"twitter_link\" href=\"https://twitter.com/intent/tweet?url=";
        // line 12
        echo ($context["share_page_url"] ?? null);
        echo "\" target=\"_blank\" class=\"trans\"><span class=\"iconc-twitter\"></span></a></li>
            <li><a id=\"linkedin_link\" href=\"https://www.linkedin.com/cws/share?url=";
        // line 13
        echo ($context["share_page_url"] ?? null);
        echo "\" target=\"_blank\" class=\"trans\"><span class=\"iconc-linkedin\"></span></a></li>
            <li><a id=\"facebool_link\" href=\"https://www.facebook.com/sharer.php?u=";
        // line 14
        echo ($context["share_page_url"] ?? null);
        echo "\" target=\"_blank\" class=\"trans\"><span class=\"iconc-facebook\"></span></a></li>
        </ul>
    </div>
</section>

<footer class=\"";
        // line 19
        echo ($context["class"] ?? null);
        echo "\">
    <div class=\"pattern-bg\"></div>
    <div class=\"inner\">
        <div class=\"team-bg\" style=\"background-image:url('";
        // line 22
        echo ($context["footer_image_url"] ?? null);
        echo "')\"></div>
        <div class=\"content_footer\">
            <div class=\"content_footer-inner\">

                <div class=\"container\">
                    <div class=\"col-md-6 col-sm-8\">
                        <div class=\"footer-splintt-logo\">
                            <img src=\"";
        // line 29
        echo ($context["footer_logo_url"] ?? null);
        echo "\">
                        </div>
                        ";
        // line 31
        echo ($context["footer_menu"] ?? null);
        echo "
                        ";
        // line 32
        echo ($context["legal_menu"] ?? null);
        echo "
                        <!-- <ul class=\"footer-menu\">
                            <li><a href=\"#\">Home</a></li>
                            <li><a href=\"#\">Portfolio</a></li>
                            <li><a href=\"#\">E-learning diensten</a></li>
                            <li><a href=\"#\">Contact & service</a></li>
                            <li><a href=\"#\">Wij zijn de splintters</a></li>
                            <li><a href=\"#\">Werken bij</a></li>
                            <li><a href=\"#\">Blog</a></li>
                            <li><a href=\"#\">Partners</a></li>
                        </ul>
                        <ul class=\"legal-page-menu mt40\">
                            <li><a href=\"#\">Privacy Statement</a></li>
                            <li><a href=\"#\">Algemene Voorwaarden</a></li>
                            <li><a href=\"#\">Disclaimer</a></li>
                        </ul> -->
                    </div>
                   <!--  <div class=\"col-md-6 col-sm-4 block-second\">
                        <ul>
                        </ul>
                    </div> -->
                    <div class=\"col-md-6 col-sm-4\">
                        <div class=\"address-info-part\">
                            <h4>";
        // line 55
        echo ($context["contact"] ?? null);
        echo "</h4>
                            <span class=\"mb20\">";
        // line 56
        echo ($context["footer_address"] ?? null);
        echo "</span>
                            <span class=\"text\">
                                <!-- <label>Tel: </label> --><a id=\"footer_telephone_link\" href=\"tel:";
        // line 58
        echo ($context["footer_telephone_land"] ?? null);
        echo "\">";
        echo ($context["footer_telephone"] ?? null);
        echo "</a>
                            </span>
                            <span class=\"text mb30\">
                                <!-- <label>Email: </label> --><a id=\"footer_email_link\" href=\"mailto:";
        // line 61
        echo ($context["footer_email"] ?? null);
        echo "\">";
        echo ($context["footer_email"] ?? null);
        echo "</a>
                            </span>
                        </div>
                        <div class=\"nrto-part\">
                            <a target=\"_blank\"><img src=\"";
        // line 65
        echo ($context["footer_nrto_img"] ?? null);
        echo "\"></a>
                            <a target=\"_blank\"><img src=\"";
        // line 66
        echo ($context["footer_learning_img"] ?? null);
        echo "\"></a>
                        </div>
                    </div>
                </div>
            

            </div>
        </div>
        <div class=\"copyright\">
            <ul class=\"social-icons-ul\">
                <span class=\"volg-text\">";
        // line 76
        echo ($context["volg_ons"] ?? null);
        echo "</span>
                <li><a id=\"twitter_link\" href=\"";
        // line 77
        echo $this->getAttribute(($context["theme_opt"] ?? null), "contact_social_twitter", array());
        echo "\" target=\"_blank\" class=\"trans\"><span class=\"iconc-twitter\"></span></a></li>
                <li><a id=\"linkedin_link\" href=\"";
        // line 78
        echo $this->getAttribute(($context["theme_opt"] ?? null), "contact_social_in", array());
        echo "\" target=\"_blank\" class=\"trans\"><span class=\"iconc-linkedin\"></span></a></li>
                <li><a id=\"facebool_link\" href=\"";
        // line 79
        echo $this->getAttribute(($context["theme_opt"] ?? null), "contact_social_fb", array());
        echo "\" target=\"_blank\" class=\"trans\"><span class=\"iconc-facebook\"></span></a></li>
            </ul>
            <ul class=\"social-icons-ul ml40 xs-ml0 xs-mt15 hidden-for-page\">
                <span class=\"volg-text\">";
        // line 82
        echo ($context["deel_deze"] ?? null);
        echo "</span>
                <li><a id=\"twitter_link\" href=\"https://twitter.com/intent/tweet?url=";
        // line 83
        echo ($context["share_page_url"] ?? null);
        echo "\" target=\"_blank\" class=\"trans\"><span class=\"iconc-twitter\"></span></a></li>
                <li><a id=\"linkedin_link\" href=\"https://www.linkedin.com/cws/share?url=";
        // line 84
        echo ($context["share_page_url"] ?? null);
        echo "\" target=\"_blank\" class=\"trans\"><span class=\"iconc-linkedin\"></span></a></li>
                <li><a id=\"facebool_link\" href=\"https://www.facebook.com/sharer.php?u=";
        // line 85
        echo ($context["share_page_url"] ?? null);
        echo "\" target=\"_blank\" class=\"trans\"><span class=\"iconc-facebook\"></span></a></li>
            </ul>
        </div>
    </div>
</footer>";
    }

    public function getTemplateName()
    {
        return "twig/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 85,  181 => 84,  177 => 83,  173 => 82,  167 => 79,  163 => 78,  159 => 77,  155 => 76,  142 => 66,  138 => 65,  129 => 61,  121 => 58,  116 => 56,  112 => 55,  86 => 32,  82 => 31,  77 => 29,  67 => 22,  61 => 19,  53 => 14,  49 => 13,  45 => 12,  41 => 11,  33 => 6,  26 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<section class=\"section-before-footer {{class}}\">
    <div class=\"pattern-bg\"></div>
    <div class=\"inner\">
        <div class=\"bgimg {{bgimageclass}}\" style=\"background-image:url('{{before_footer_image_url}}')\"></div>
        <div class=\"content-wrapper\">
            {{before_footer_content}}
        </div>
    </div>
     <div class=\"social-icons text-center mb70 show_on_landingpage \">
        <ul class=\"social-icons-ul social-style1\">
            <span class=\"volg-text\">{{deel_deze}}</span>
            <li><a id=\"twitter_link\" href=\"https://twitter.com/intent/tweet?url={{share_page_url}}\" target=\"_blank\" class=\"trans\"><span class=\"iconc-twitter\"></span></a></li>
            <li><a id=\"linkedin_link\" href=\"https://www.linkedin.com/cws/share?url={{share_page_url}}\" target=\"_blank\" class=\"trans\"><span class=\"iconc-linkedin\"></span></a></li>
            <li><a id=\"facebool_link\" href=\"https://www.facebook.com/sharer.php?u={{share_page_url}}\" target=\"_blank\" class=\"trans\"><span class=\"iconc-facebook\"></span></a></li>
        </ul>
    </div>
</section>

<footer class=\"{{class}}\">
    <div class=\"pattern-bg\"></div>
    <div class=\"inner\">
        <div class=\"team-bg\" style=\"background-image:url('{{footer_image_url}}')\"></div>
        <div class=\"content_footer\">
            <div class=\"content_footer-inner\">

                <div class=\"container\">
                    <div class=\"col-md-6 col-sm-8\">
                        <div class=\"footer-splintt-logo\">
                            <img src=\"{{footer_logo_url}}\">
                        </div>
                        {{footer_menu}}
                        {{legal_menu}}
                        <!-- <ul class=\"footer-menu\">
                            <li><a href=\"#\">Home</a></li>
                            <li><a href=\"#\">Portfolio</a></li>
                            <li><a href=\"#\">E-learning diensten</a></li>
                            <li><a href=\"#\">Contact & service</a></li>
                            <li><a href=\"#\">Wij zijn de splintters</a></li>
                            <li><a href=\"#\">Werken bij</a></li>
                            <li><a href=\"#\">Blog</a></li>
                            <li><a href=\"#\">Partners</a></li>
                        </ul>
                        <ul class=\"legal-page-menu mt40\">
                            <li><a href=\"#\">Privacy Statement</a></li>
                            <li><a href=\"#\">Algemene Voorwaarden</a></li>
                            <li><a href=\"#\">Disclaimer</a></li>
                        </ul> -->
                    </div>
                   <!--  <div class=\"col-md-6 col-sm-4 block-second\">
                        <ul>
                        </ul>
                    </div> -->
                    <div class=\"col-md-6 col-sm-4\">
                        <div class=\"address-info-part\">
                            <h4>{{contact}}</h4>
                            <span class=\"mb20\">{{footer_address}}</span>
                            <span class=\"text\">
                                <!-- <label>Tel: </label> --><a id=\"footer_telephone_link\" href=\"tel:{{footer_telephone_land}}\">{{footer_telephone}}</a>
                            </span>
                            <span class=\"text mb30\">
                                <!-- <label>Email: </label> --><a id=\"footer_email_link\" href=\"mailto:{{footer_email}}\">{{footer_email}}</a>
                            </span>
                        </div>
                        <div class=\"nrto-part\">
                            <a target=\"_blank\"><img src=\"{{footer_nrto_img}}\"></a>
                            <a target=\"_blank\"><img src=\"{{footer_learning_img}}\"></a>
                        </div>
                    </div>
                </div>
            

            </div>
        </div>
        <div class=\"copyright\">
            <ul class=\"social-icons-ul\">
                <span class=\"volg-text\">{{volg_ons}}</span>
                <li><a id=\"twitter_link\" href=\"{{theme_opt.contact_social_twitter}}\" target=\"_blank\" class=\"trans\"><span class=\"iconc-twitter\"></span></a></li>
                <li><a id=\"linkedin_link\" href=\"{{theme_opt.contact_social_in}}\" target=\"_blank\" class=\"trans\"><span class=\"iconc-linkedin\"></span></a></li>
                <li><a id=\"facebool_link\" href=\"{{theme_opt.contact_social_fb}}\" target=\"_blank\" class=\"trans\"><span class=\"iconc-facebook\"></span></a></li>
            </ul>
            <ul class=\"social-icons-ul ml40 xs-ml0 xs-mt15 hidden-for-page\">
                <span class=\"volg-text\">{{deel_deze}}</span>
                <li><a id=\"twitter_link\" href=\"https://twitter.com/intent/tweet?url={{share_page_url}}\" target=\"_blank\" class=\"trans\"><span class=\"iconc-twitter\"></span></a></li>
                <li><a id=\"linkedin_link\" href=\"https://www.linkedin.com/cws/share?url={{share_page_url}}\" target=\"_blank\" class=\"trans\"><span class=\"iconc-linkedin\"></span></a></li>
                <li><a id=\"facebool_link\" href=\"https://www.facebook.com/sharer.php?u={{share_page_url}}\" target=\"_blank\" class=\"trans\"><span class=\"iconc-facebook\"></span></a></li>
            </ul>
        </div>
    </div>
</footer>", "twig/footer.twig", "/srv/www/splintt.com/current/web/app/themes/oye/twig/footer.twig");
    }
}
