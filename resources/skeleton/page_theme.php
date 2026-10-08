<?php
namespace Concrete\Package\ThemePackage\Theme\NewTheme; // Change NewTheme to the CamelCase of the theme folder name

use Concrete\Core\Page\Theme\Theme;
use Concrete\Core\Feature\Features;

class PageTheme extends Theme
{
    /**
     * getThemeName
     *
     * Name of the theme
     *
     * @return string
     */
    public function getThemeName()
    {
        return t('New Theme');
    }

    /**
     * getThemeDescription
     *
     * Description of the Theme
     *
     * @return string
     */
    public function getThemeDescription()
    {
        return t('New Theme For Site');
    }

    /**
     * Get the handles of the features supported by this theme.
     *
     * @return string[]
     *
     * @see \Concrete\Core\Feature\Feature for a list of features
     * @see \Concrete\Theme\Elemental\PageTheme::getThemeSupportedFeatures() for an example
     */
    public function getThemeSupportedFeatures()
    {
        return [
            Features::BASICS,
            Features::TYPOGRAPHY,
            Features::NAVIGATION,
        ];
    }

    /**
     * getThemeResponsiveImageMap
     *
     * To use these you need to create thumbnails in System & Settings > Files > Thumbnails
     * Always place in DESCENDING ORDER of sizes, keys relate to the handle created in the thumbnails section
     *
     * So if an image block, or the wysiwyg editor puts an image on the page the system should automatically sort out the image sizing.
     *
     * For More Info:
     * https://documentation.concrete5.org/developers/designing-for-concrete5/supporting-responsive-images-in-your-concrete5-theme
     *
     * @return array
     */
    public function getThemeResponsiveImageMap()
    {
        return [
            '4k'    => '2500px',
            'hd'    => '1800px',
            'xxxl'  => '1600px',
            'xxl'   => '1400px',
            'xl'    => '1200px',
            'lg'    => '992px',
            'md'    => '768px',
            'sm'    => '576px',
            'xs'    => '0'
        ];
    }

    /**
     * Mark an asset as reuired by this theme.
     * Accepts the same arguments as \Concrete\Core\Http\ResponseAssetGroup::requireAsset().
     *
     * @see \Concrete\Core\Http\ResponseAssetGroup::requireAsset()
     */
    public function registerAssets()
    {
        $this->requireAsset('jquery');
    }

    /**
     * getThemeEditorClasses
     *
     * Set theme content editor styles classes in the WYSIWIG editor
     *
     * title - is the name that will be displayed in the custom styles dropdown in Redactor
     * menuClass - will be the class/classes applied to the dropdown title text (this makes the title text a preview of the style)
     * spanClass - will be the class/classes you want applied for that custom style (the classes applied to the selected text)
     *
     * There is the ability to extend this further to allow for different classes and styles applied,
     * as the above generally just adds a span inside of the element you have chosen (nasty)
     *
     * For more info:
     * https://documentation.concrete5.org/tutorials/adding-redactor-custom-styles-in-a-theme-content-block
     * https://documentation.concrete5.org/tutorials/adding-ckeditor-custom-editor-styles-in-a-theme-content-blockrich-text-editor
     *
     * @return void
     */
    public function getThemeEditorClasses()
    {
        $classes = [];
        $this->getHeadingClasses($classes);
        $this->getDisplayHeadingClasses($classes);
        $this->getTextColorClasses($classes);
        $this->getTextStyleClasses($classes);
        $this->getParagraphStyleClasses($classes);

        return $classes;
    }

    /**
     * Add all Bootstrap Heading classses to Content editor
     */
    protected function getHeadingClasses(&$classes)
    {
        $elements = ['h1','h2','h3','h4','h5','h6','p','li'];

        for ($i = 1; $i <= 6; $i++) {
            $classes[] = [
                'title' => t('Heading %s', $i),
                'element' => $elements,
                'attributes' => [
                    'class' => 'h' . $i
                ]
            ];
        }
    }

    public function getDisplayHeadingClasses(&$classes)
    {
        $elements = ['h1','h2','h3','h4','h5','h6'];

        for ($i = 1; $i <= 6; $i++) {
            $classes[] = [
                'title' => t('Display Heading %s', $i),
                'element' => $elements,
                'attributes' => [
                    'class' => 'display-' . $i
                ]
            ];
        }
    }

    protected function getTextColorClasses(&$classes)
    {
        $types = [
            'primary',
            'secondary',
            'success',
            'danger',
            'warning',
            'info',
            'light',
            'dark',
            'body',
            'muted',
            'white',
            'black'
        ];

        foreach ($types as $t) {
            $classes[] = [
                'title' => t('Text %s', ucfirst($t)),
                'attributes' => [
                    'class' => 'text-' . $t
                ]
            ];
        }
    }

    protected function getTextStyleClasses(&$classes)
    {
        $types = [
            'start',
            'center',
            'end',
            'lowercase',
            'uppercase',
            'capitalize',
            'reset',
            'nowrap',
            'monospace'
        ];

        foreach ($types as $t) {
            $classes[] = [
                'title' => t('Text %s', ucfirst($t)),
                'attributes' => [
                    'class' => 'text-' . $t
                ]
            ];
        }
    }

    protected function getParagraphStyleClasses(&$classes)
    {
        $classes[] = [
            'title' => t('Lead Paragraph'),
            'element' => [ 'p' ],
            'attributes' => [
                'class' => 'lead'
            ]
        ];
    }
}
