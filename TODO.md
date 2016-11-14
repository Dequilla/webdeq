# TODO
- [ ] Maybe re implement loading as a tree structure? 
- [ ] Implement include nesting, make templates able to include other templates.
- [ ] Move "disposable" content like `Saved/page/generated` and `Saved/logs` to a disposable folder and add all it's content to gitignore so only the folder structure stays, not the content.
- [ ] Add a json or alike file to use when checking wether to update generated files or not.
- [ ] Add autoLoaders instead of includes.
- [ ] Change to camelCasing for names.
- [ ] Move routes magic function from the user-side of the filestructure.
- [ ] Add variables to route to extent the usefullness of our pretty urls.
- [ ] Improve class names. Prefix stuff.
- [ ] Figure out a way to know when generated files need to be updated when caching is enabled.
- [ ] Build a error system to give more exact locations of webdeq errors rather than the php standard errors who are in the absolutely wrong place.
- [ ] Add developermode setting so that we can choose we
ther or not to give proper errors or just "something went wrong" to the client.
- [ ] Test the deq-var feature that is featured in the php-example page, it works but is unstable, also clear all the php errors from that feature.

# DONE

- [x] Add a variable system to the templating system ( CURRENTLY VERY UNSTABLE BUT WORKING)
