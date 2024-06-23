wp.domReady(() => {
    const { addFilter } = wp.hooks;
    const { createHigherOrderComponent } = wp.compose;
    const { createElement } = wp.element;

    const setDefaultAttributes = createHigherOrderComponent((BlockEdit) => {
        return (props) => {
            if (props.name === 'core/spacer' && !props.attributes.height) {
                props.setAttributes({ height: 48 }); // Set default height to 48px (3rem)
            }
            return createElement(BlockEdit, props);
        };
    }, 'setDefaultAttributes');

    addFilter(
        'editor.BlockEdit',
        'my-plugin/set-default-attributes',
        setDefaultAttributes
    );
});
