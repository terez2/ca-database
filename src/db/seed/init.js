db.createUser({
    user: "ca",
    pwd: "123456",
    roles: [{
        role: "readWrite",
        db: "ca"
    }]
});