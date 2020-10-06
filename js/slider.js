class Caroussel {
    /**
     * 
     * @param{HTMLElement} element
     * @param{Object} options
     * @param{Object} options.slidesToScroll Nombre d'éléments à faire défiler
     * @param{Object} options.slidesVisible Nombre d'éléments visible dans un slide
     */
    constructor(element, options = {}) {
        this.element = element
        this.options = Object.assign({}, {
            slidesToScroll: 1,
            slidesVisible: 1
        }, options)
        this.children = [].slice.call(element.children)
        let ratio = this.children.lenght / this.options.slidesVisible

        container.style.width = (ratio * 100) + "%"
        root.appendChild(container)
        this.element.appendChild(root)
        this.children.forEach((child) => {
            item.style.width = ((100 / this.options.slidesVisible) / ratio) + "%"
            item.appendChild(child)
            container.appendChild(child)
        })


    }


}




document.addEventListener('DOMContentLoaded', function () {

    new Caroussel(document.querySelector("#galery"), {
        slidesToScroll: 1,
        slidesVisible: 2,
    })

})

