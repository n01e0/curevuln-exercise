FROM golang:1.23

WORKDIR /app
COPY . .

RUN go mod init go-datarace && \
    go mod tidy && \
    go build -o main .

EXPOSE 8080
CMD ["./main"]
