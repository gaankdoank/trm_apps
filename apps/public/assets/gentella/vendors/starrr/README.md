{
  "name": "starrr",
  "version": "2.0.0",
  "main": "Gruntfile.coffee",
  "author": "ajb <adam@dobt.co>",
  "license": "MIT",
  "devDependencies": {
    "grunt-contrib-sass": "^0.9.2",
    "grunt-contrib-coffee": "^0.13.0",
    "grunt-contrib-watch": "^0.6.1",
    "grunt": "^0.4.5"
  }
}
an 5 stars

```js
$('.starrr').starrr({
  max: 10
})
```

### Read-only

```js
$('.starrr').starrr({
  readOnly: true
})
```

### Do something with the rating...

```js
$('.starrr').starrr({
  change: function(e, value){
    alert('new rating is ' + value)
  }
})
```

Or if you prefer events:

```js
$('.starrr').on('starrr:change', function(e, value){
  alert('new rating is ' + value)
})
```

## Developing

- `npm install`
- `npm install -g grunt-cli`
- Make changes in `src/`
- Run `grunt` to compile them

## License

MIT
