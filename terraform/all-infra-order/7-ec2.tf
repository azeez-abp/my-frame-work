resource "aws_instance" "abp_ec2-1" {
  count         = 1
  subnet_id     = aws_subnet.private_us_east_1a
  ami           = data.aws_ami.abp_data.id
  instance_type = "t2.micro"
  tags = {
    Environment = "stagging"
  }

}
