# Project 4
+ By: Matthew Thomas
+ Production URL: <http://p4.reelmatt.me>

## Database

Primary tables:
  + `listings`
  + `realtors`
  + `features`
  
Pivot table(s):
  + `feature_listing`


## CRUD

__Create__
  + Visit <http://p4.reelmatt.me/apartments/create>, or click 'New Listing' on the nav
  + Fill out form
  + Click *Add listing*
  + See listing appear on with others, along with confirmation message
  
__Read__
  + Visit <http://p4.reelmatt.me/apartments> see a listing of all listings
  
__Update__
  + Visit <http://p4.reelmatt.me/apartments>; select a listing by clicking 'Listing info'
  + Select edit details to make changes/updates as necessary
  + Click *Save changes*
  + Observe confirmation message
  
__Delete__
  + Visit <http://p4.reelmatt.me/apartments>; click on 'Listing Info' for any of the
    listings shown.
  + From the 'Listing Info' page, choose the 'Remove listing' button
  + Confirm deletion
  + Observe confirmation message

## Outside resources
  + [Bootstrap CSS](http://getbootstrap.com)
    + The CSS in my `main.css` file was copied from the Foobooks application mainly to provide a starting
    point. Modifications/new styles were added in `listings.css`, `realtors.css`, and `search.css`. I did
    remove a lot of the book-specific styles from `main.css` and used new listing-specific styles
    created for this project (see below: links about designing a grid layout using CSS).
  + [House icon](http://www.iconarchive.com/show/small-n-flat-icons-by-paomedia/house-icon.html) for welcome page
  + User [avatar icon](https://pixabay.com/en/blank-profile-picture-mystery-man-973460/)
  + [Google Maps Embed API reference](https://developers.google.com/maps/documentation/embed/guide#forming_the_url)
  + Issue with a seeder not being recognized, solved in [this forum post](https://stackoverflow.com/questions/26143315/laravel-5-artisan-seed-reflectionexception-class-songstableseeder-does-not-e)
  + Help with accessing data from foreign table, [pointed towards Eager Loading](https://laracasts.com/discuss/channels/laravel/how-to-obtain-data-from-another-table-using-foreign-key-in-view?page=1)
  + CSS grid articles
    + <https://css-tricks.com/introduction-fr-css-unit/>
    + <https://hacks.mozilla.org/2017/10/an-introduction-to-css-grid-layout-part-1/>
    + <https://medium.com/flexbox-and-grids/how-to-efficiently-master-the-css-grid-in-a-jiffy-585d0c213577>
    + <https://gridbyexample.com/examples/>
  + [PHP string methods](https://www.w3schools.com/php/php_ref_string.asp)
  + [PHP date formatting](https://secure.php.net/manual/en/function.date.php)
  + [PHP date_create()](https://www.w3schools.com/php/func_date_date_format.asp)
  + [Disabled forms with Bootstrap](https://getbootstrap.com/docs/4.0/components/forms/#disabled-forms)
  + [Help with arrays](http://php.net/manual/en/function.array-push.php)
  + [Targeting last item in a foreach loop](https://dev-notes.eu/2016/09/target-the-last-item-in-a-php-foreach-loop/)
  + Javascript links (see "Note for instructor" below)
    + Help with [range sliders](https://www.w3schools.com/howto/howto_js_rangeslider.asp) for search page
    + Example of a [range slider with two handles](https://www.w3schools.com/jquerymobile/tryit.asp?filename=tryjqmob_forms_slider_range)
    + [Displaying/hiding information via Javascript when using a select](https://stackoverflow.com/questions/13925845/javascript-show-hide-based-on-dropdown)
  
## Code style divergences
  + Some lines exceed 80 characters.
  + In the seeder files, I added extra spaces in between each array item to better view the data in each
  row (so it's clearer which field is what).

## Notes for instructor
  + I re-purposed (with modifications) several of the basic layout/CRUD operations from Foobooks
    for this application.
  + A majority of my work went into the search functionality of the site as well as trying to factor out
    code into separate classes, as covered in [this bonus topic on the forums](https://github.com/susanBuck/dwa15-spring2018/issues/68).
  + For the search feature, as well as the forms for adding/editing listings/realtors, I attempted to add Javascript
    functionality to more dynamically show/restrict features for the user (e.g. a slider to select price on the search page
    rather than an `<input type='number'>` field). I never got these features working well enough that I was happy, so I reverted
    to a more basic design. I included the links above mainly for reference.
  + I also began to implement user authentication into the site, and got it mostly working. However, the relationships between
    users/listings/realtors I think would need to be re-worked for an actual launch. For example, I was able to restrict listings
    to only ones belonging to the user, but *all* realtors appeared. Re-working the databases to add a connection between user/realtors
    I think would be necessary and I didn't have time to implement this. The work I did complete lives in the `users` branch on my
    github page as reference.
  + Other key development areas I focused on was designing a grid layout for the apartment listing view and
    incorporating the Google Maps API/embeddable maps based on address.
  + As per our emails from May 6-7, I recevied one W3 validation warning I ran into when testing my site regarding `<input type='date'>`.
