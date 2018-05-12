export const socialProfile = {
    avatar: "/test.png",
    name: "Test Name",
    socialLinks: {}

}


export const user = {
    id: 0,
    details: socialProfile,
    socialLinks: {}
}

export const comment = {
    body: 'placeholder',
    author: user,
}


export const category = {
    id: 0,
    name: 'Placehlder cat'
}

export const post = {
    "title": "Placeholder",
    "date": "....",
    "date_raw": "....",
    "excerpt": "Placeholder",
    "author": user,
    "category": category,
    "comments": [comment]

}