import React from 'react';
import './App.css';
function Gallery() {
    return (
        <div>
            <div class="gallery">
                <figure class="gallery__item gallery__item--1">
                    <img src="http://localhost/newscorp/wp-content/uploads/2020/11/theaus_icon.png" />
                </figure>
                <figure class="gallery__item gallery__item--1">
                    <img src="http://localhost/newscorp/wp-content/uploads/2020/11/wall_street_journal_icon.png" />
                </figure>
                <figure class="gallery__item gallery__item--1">
                    <img src="http://localhost/newscorp/wp-content/uploads/2020/11/dailytelegraph_icon.png" />
                </figure>
                <figure class="gallery__item gallery__item--1">
                    <img src="http://localhost/newscorp/wp-content/uploads/2020/11/herald_sun_icon.png" />
                </figure>
            </div>
            <div class="gallery">
                <figure class="gallery__item gallery__item--1">
                    <img src="http://localhost/newscorp/wp-content/uploads/2020/11/courier_mail_icon.png" />
                </figure>
                <figure class="gallery__item gallery__item--1">
                    <img src="http://localhost/newscorp/wp-content/uploads/2020/11/the_advertiser_icon.png" />
                </figure>
                <figure class="gallery__item gallery__item--1">
                    <img src="http://localhost/newscorp/wp-content/uploads/2020/11/ntnews_icon.png" />
                </figure>
                <figure class="gallery__item gallery__item--1">
                    <img src="http://localhost/newscorp/wp-content/uploads/2020/11/mercury_icon.png" />
                </figure>
            </div>
        </div>
    );
}
export default Gallery;