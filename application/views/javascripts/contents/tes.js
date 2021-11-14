function run({ url, data, method }) {
  $.ajax({
    method: method,
    url: url,
    data: data
  }).done((data) => {
    console.log(data);
  }).fail(($xhr) => {
    console.log($xhr);
  })
}

// contoh login
run({
  url: 'https://distribusi.komunitashalal.com/api/login',
  data: {
    username: 'sales',
    password: '123456'
  },
  method: 'post'
})

// contoh get
run({
  url: 'https://distribusi.komunitashalal.com/api/profile',
  data: {
    key: "distribusi20210909091905613a33f946a99",
  },
  method: 'get'
})