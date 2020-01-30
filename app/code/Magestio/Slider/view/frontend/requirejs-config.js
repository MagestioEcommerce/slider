var config = {
    map: {
        '*': {
            owl_carousel: 'Magestio_Slider/js/owl.carousel',
            owl_config: 'Magestio_Slider/js/owl.config'
        }
    },
    shim: {
        owl_carousel: {
            deps: ['jquery']
        },
        owl_config: {
            deps: ['jquery','owl_carousel']
        }
    }
};