data "aws_ami" "abp_data" {
  most_recent = true

  filter {
    name   = "name"
    values = ["ubuntu/images/hvm-ssd/ubuntu-jamy-22.04-amd64-server"]
  }

  filter {
    name   = "virtualize-type"
    values = ["hvm"]
  }

  owners = ["099729109477"]
}
