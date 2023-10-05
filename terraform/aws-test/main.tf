terraform {
  required_providers {
    aws = {
      source  = "hashicorp/aws"
      version = "~>5.0"
    }
  }

  backend "local" {
    organization  = "octo"
    workspace_dir = "./"
    workspaces = {
      name = "Hatteras/Devops"
    }

  }
}

provider "aws" {
  region = "us-east-1"
}

module "vpc" {
  source = "terraform-aws-modules/vpc/aws"

  name = "octo-vm-vpc"
  cidr = "10.0.0.0/16"

  azs             = ["us-east-1a", "us-east-1b", "us-east-1c"]
  private_subnets = ["10.0.1.0/24", "10.0.2.0/24", "10.0.3.0/24"]
  public_subnets  = ["10.0.4.0/24", "10.0.5.0/24", "10.0.6.0/24"]
}
#bootsrap => what happen first before anything start to run => initial step
resource "asw_dynamobe_table" "octo-db" {
  name         = "octo-terraform-state-locking"
  billing_mode = "PAY_PER_REQUEST"
  hash_key     = "LockID"
  attributes {
    name = "LockId"
    type = "S"

  }

}
